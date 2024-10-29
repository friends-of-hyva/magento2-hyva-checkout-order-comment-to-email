
# Musicworld Hyvä Checkout Customer Comment Module

## Overview

The `Musicworld_HyvaCheckoutOrderCommentToEmail` module captures and saves customer comments from the checkout process in Magento 2. When a customer leaves a comment on their order, this module ensures the comment is added to the order as a customer note, which can be visible on the frontend if configured as such.

## Requirements

- Magento 2.4.x or higher
- PHP 7.4 or higher
- Hyvä Themes checkout integration

## Installation

### Composer Installation

1. Add the module to your Magento installation via Composer:

    ```bash
    composer config repositories.friends-of-hyva vcs https://github.com/friends-of-hyva/magento2-hyva-checkout-order-comment-to-email.git
    composer require musicworld/hyva-checkout-order-comment-to-email
    ```

2. Run the following Magento commands to enable and set up the module:

    ```bash
    bin/magento module:enable Musicworld_HyvaCheckoutOrderCommentToEmail
    bin/magento setup:upgrade
    bin/magento cache:flush
    ```

### Manual Installation

1. Clone the repository to your Magento `app/code` directory:

    ```bash
    git clone https://github.com/friends-of-hyva/magento2-hyva-checkout-order-comment-to-email.git app/code/Musicworld/HyvaCheckoutCustomerComment
    ```

2. Enable and set up the module:

    ```bash
    bin/magento module:enable Musicworld_HyvaCheckoutOrderCommentToEmail
    bin/magento setup:upgrade
    bin/magento cache:flush
    ```

## Usage

This module listens to the `sales_order_status_history_save_after` event and checks if the status history entry has the `is_customer_comment` flag set. If so, the comment is saved as a customer note on the order.
