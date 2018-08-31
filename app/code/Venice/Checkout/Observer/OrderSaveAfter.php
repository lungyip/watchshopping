<?php

namespace Venice\Checkout\Observer;

use Magento\Framework\Event\ObserverInterface;
use Venice\Checkout\Api\Data\OrderPaymentInterfaceFactory;
use Venice\Checkout\Api\Data\OrderProductInterfaceFactory;
use Venice\Checkout\Model\OrderPaymentRepository;
use Venice\Checkout\Model\OrderProductRepository;

class OrderSaveAfter implements ObserverInterface
{
    protected $orderPaymentInterfaceFactory;

    protected $orderProductInterfaceFactory;

    protected $orderPaymentRepository;

    protected $orderProductRepository;

    public function __construct(
        OrderPaymentInterfaceFactory $orderPaymentInterfaceFactory,
        OrderProductInterfaceFactory $orderProductInterfaceFactory,
        OrderPaymentRepository $orderPaymentRepository,
        OrderProductRepository $orderProductRepository
    ) {
        $this->orderPaymentInterfaceFactory = $orderPaymentInterfaceFactory;
        $this->orderProductInterfaceFactory = $orderProductInterfaceFactory;
        $this->orderPaymentRepository = $orderPaymentRepository;
        $this->orderProductRepository = $orderProductRepository;
    }

    public function execute(\Magento\Framework\Event\Observer $observer) {
        /** @var \Venice\Checkout\Api\Data\OrderPaymentInterface $orderPayment */
        $orderPayment = $this->orderPaymentInterfaceFactory->create();

        /** @var \Magento\Sales\Api\Data\OrderInterface $order */
        $order = $observer->getOrder();

        /** @var \Magento\Sales\Api\Data\OrderItemInterface[] $products */
        $products = $order->getItems();

        /** @var \Magento\Sales\Api\Data\OrderPaymentInterface $order */
        $payment = $order->getPayment();

        $orderPayment->setOrderId($order->getEntityId());
        $orderPayment->setIncrementId($order->getIncrementId());
        $orderPayment->setOrderCurrencyCode($order->getOrderCurrencyCode());
        $orderPayment->setBaseGrandTotal($order->getBaseGrandTotal());
        $orderPayment->setBaseSubtotal($order->getBaseSubtotal());
        $orderPayment->setBaseTaxAmount($order->getBaseTaxAmount());
        $orderPayment->setBaseShippingAmount($order->getBaseShippingAmount());
        $orderPayment->setBaseDiscountAmount($order->getBaseDiscountAmount());

        $orderPayment->setDiscountDescription($order->getDiscountDescription());
        $orderPayment->setCustomerId($order->getCustomerId());
        $orderPayment->setCustomerEmail($order->getCustomerEmail());
        $orderPayment->setCustomerFirstname($order->getCustomerFirstname());
        $orderPayment->setCustomerLastname($order->getCustomerLastname());
        $orderPayment->setCustomerGroupId($order->getCustomerGroupId());
        $orderPayment->setCustomerIsGuest($order->getCustomerIsGuest());
        $orderPayment->setRemoteIp($order->getRemoteIp());

        $orderPayment->setMagentoStatus($order->getStatus());
        $orderPayment->setOrderStatus(-1); // Order status default -1
        $orderPayment->setStoreId($order->getStoreId());
        $orderPayment->setStoreName($order->getStoreName());
        $orderPayment->setTotalItemCount($order->getTotalItemCount());
        $orderPayment->setBaseTotalPaid($order->getBaseTotalPaid());
        $orderPayment->setPaymentCode($payment->getMethodInstance()->getCode());

        $this->orderPaymentRepository->save($orderPayment);

        foreach ($products as $product) {
            $size  = $product->getQtyOrdered();

            // Save each product into database
            for ($i = 0; $i < $size; $i ++ ) {
                /** @var \Venice\Checkout\Api\Data\OrderProductInterface $orderProduct */
                $orderProduct = $this->orderProductInterfaceFactory->create();

                $orderProduct->setOrderId($order->getEntityId());
                $orderProduct->setProductId($product->getProductId());
                $orderProduct->setSku($product->getSku());
                $orderProduct->setName($product->getName());
                $orderProduct->setPrice($product->getPrice());

                $orderProduct->setTaxPercent($product->getTaxPercent());
                $orderProduct->setTaxAmount($product->getTaxAmount());
                $orderProduct->setDiscountAmount($product->getDiscountAmount());
                $orderProduct->setBasePriceInclTax($product->getBasePriceInclTax());

                $this->orderProductRepository->save($orderProduct);
            }

        }

    }
}
