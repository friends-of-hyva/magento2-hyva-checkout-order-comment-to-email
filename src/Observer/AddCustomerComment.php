<?php
namespace Musicworld\HyvaCheckoutOrderCommentToEmail\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Psr\Log\LoggerInterface;

class AddCustomerComment implements ObserverInterface
{
    protected $orderRepository;
    protected $logger;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        LoggerInterface $logger
    ) {
        $this->orderRepository = $orderRepository;
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $statusHistory = $observer->getEvent()->getStatusHistory();
        $order = $statusHistory->getOrder();
        if (!$order && $statusHistory->getParentId()) {
            try {
                $order = $this->orderRepository->get($statusHistory->getParentId());
            } catch (\Exception $e) {
                $this->logger->error('Error loading order: ' . $e->getMessage());
            }
        }

        if ($order && $statusHistory->getIsVisibleOnFront() && $statusHistory->getIsCustomerComment()) {

            $order->setCustomerNote($statusHistory->getComment());

            try {
                $this->orderRepository->save($order);
            } catch (\Exception $e) {
                $this->logger->error('Error saving customer note: ' . $e->getMessage());
            }
        }
    }
}
