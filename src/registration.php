<?php
declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Musicworld_HyvaCheckoutOrderCommentToEmail',
    __DIR__
);