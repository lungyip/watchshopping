<?php

namespace Venice\Checkout\Api;

use Venice\Checkout\Api\Data\OrderProductInterface;

/**
 * Interface OrderPaymentRepositoryInterface
 * @package Venice\Checkout\Api
 */
interface OrderProductRepositoryInterface
{
    public function save(OrderProductInterface $orderProduct);
}
