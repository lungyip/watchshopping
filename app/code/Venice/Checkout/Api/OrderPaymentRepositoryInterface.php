<?php

namespace Venice\Checkout\Api;

use Venice\Checkout\Api\Data\OrderPaymentInterface;

/**
 * Interface OrderPaymentRepositoryInterface
 * @package Venice\Checkout\Api
 */
interface OrderPaymentRepositoryInterface
{
    public function save(OrderPaymentInterface $orderPayment);
}
