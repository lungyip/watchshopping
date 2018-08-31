<?php

namespace Venice\Checkout\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Venice\Checkout\Api\Data\OrderPaymentInterface;

class OrderPayment extends AbstractModel implements IdentityInterface, OrderPaymentInterface
{
    const CACHE_TAG = 'checkout_order_payment';

    protected $_cacheTag = 'checkout_order_payment';

    protected $_eventPrefix = 'checkout_order_payment';

    protected function _construct()
    {
        $this->_init('Venice\Checkout\Model\ResourceModel\OrderPayment');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }

    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    public function setOrderId($orderId)
    {
        $this->setData(self::ORDER_ID, $orderId);
    }

    public function getIncrementId()
    {
        return $this->getData(self::INCREMENT_ID);
    }

    public function setIncrementId($incrementId)
    {
        $this->setData(self::INCREMENT_ID, $incrementId);
    }

    public function getOrderCurrencyCode()
    {
        return $this->getData(self::ORDER_CURRENCY_CODE);
    }

    public function setOrderCurrencyCode($orderCurrencyCode)
    {
        $this->setData(self::ORDER_CURRENCY_CODE, $orderCurrencyCode);
    }

    public function getBaseGrandTotal()
    {
        return $this->getData(self::BASE_GRAND_TOTAL);
    }

    public function setBaseGrandTotal($baseGrandTotal)
    {
        $this->setData(self::BASE_GRAND_TOTAL, $baseGrandTotal);
    }

    public function getBaseSubtotal()
    {
        return $this->getData(self::BASE_SUBTOTAL);
    }

    public function setBaseSubtotal($baseSubtotal)
    {
        $this->setData(self::BASE_SUBTOTAL, $baseSubtotal);
    }

    public function getBaseTaxAmount()
    {
        return $this->getData(self::BASE_TAX_AMOUNT);
    }

    public function setBaseTaxAmount($baseTaxAmount)
    {
        $this->setData(self::BASE_TAX_AMOUNT, $baseTaxAmount);
    }

    public function getBaseShippingAmount()
    {
        return $this->getData(self::BASE_SHIPPING_AMOUNT);
    }

    public function setBaseShippingAmount($baseShippingAmount)
    {
        $this->setData(self::BASE_SHIPPING_AMOUNT, $baseShippingAmount);
    }

    public function getBaseDiscountAmount()
    {
        return $this->getData(self::BASE_DISCOUNT_AMOUNT);
    }

    public function setBaseDiscountAmount($baseDiscountAmount)
    {
        $this->setData(self::BASE_DISCOUNT_AMOUNT, $baseDiscountAmount);
    }

    public function getDiscountDescription()
    {
        return $this->getData(self::DISCOUNT_DESCRIPTION);
    }

    public function setDiscountDescription($discountDescription)
    {
        $this->setData(self::DISCOUNT_DESCRIPTION, $discountDescription);
    }

    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    public function setCustomerId($customerId)
    {
        $this->setData(self::CUSTOMER_ID, $customerId);
    }

    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    public function setCustomerEmail($customerEmail)
    {
        $this->setData(self::CUSTOMER_EMAIL, $customerEmail);
    }

    public function getCustomerFirstname()
    {
        return $this->getData(self::CUSTOMER_FIRSTNAME);
    }

    public function setCustomerFirstname($customerFirstname)
    {
        $this->setData(self::CUSTOMER_FIRSTNAME, $customerFirstname);
    }

    public function getCustomerLastname()
    {
        return $this->getData(self::CUSTOMER_LASTNAME);
    }

    public function setCustomerLastname($customerLastname)
    {
        $this->setData(self::CUSTOMER_LASTNAME, $customerLastname);
    }

    public function getCustomerGroupId()
    {
        return $this->getData(self::CUSTOMER_GROUP_ID);
    }

    public function setCustomerGroupId($customerGroupId)
    {
        $this->setData(self::CUSTOMER_GROUP_ID, $customerGroupId);
    }

    public function getCustomerIsGuest()
    {
        return $this->getData(self::CUSTOMER_IS_GUEST);
    }

    public function setCustomerIsGuest($customerIsGuest)
    {
        $this->setData(self::CUSTOMER_IS_GUEST, $customerIsGuest);
    }

    public function getRemoteIp()
    {
        return $this->getData(self::REMOTE_IP);
    }

    public function setRemoteIp($remoteIp)
    {
        $this->setData(self::REMOTE_IP, $remoteIp);
    }

    public function getMagentoStatus()
    {
        return $this->getData(self::MAGENTO_STATUS);
    }

    public function setMagentoStatus($magentoStatus)
    {
        $this->setData(self::MAGENTO_STATUS, $magentoStatus);
    }

    public function getOrderStatus()
    {
        return $this->getData(self::ORDER_STATUS);
    }

    public function setOrderStatus($orderStatus)
    {
        $this->setData(self::ORDER_STATUS, $orderStatus);
    }

    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    public function setStoreId($storeId)
    {
        $this->setData(self::STORE_ID, $storeId);
    }

    public function getStoreName()
    {
        return $this->getData(self::STORE_NAME);
    }

    public function setStoreName($storeName)
    {
        $this->setData(self::STORE_NAME, $storeName);
    }

    public function getTotalItemCount()
    {
        return $this->getData(self::TOTAL_ITEM_COUNT);
    }

    public function setTotalItemCount($totalItemCount)
    {
        $this->setData(self::TOTAL_ITEM_COUNT, $totalItemCount);
    }

    public function getBaseTotalPaid()
    {
        return $this->getData(self::BASE_TOTAL_PAID);
    }

    public function setBaseTotalPaid($baseTotalPaid)
    {
        $this->setData(self::BASE_TOTAL_PAID, $baseTotalPaid);
    }

    public function getPaymentCode()
    {
        return $this->getData(self::PAYMENT_CODE);
    }

    public function setPaymentCode($paymentCode)
    {
        $this->setData(self::PAYMENT_CODE, $paymentCode);
    }

    public function getShipmentCarrierCode()
    {
        return $this->getData(self::SHIPMENT_CARRIER_CODE);
    }

    public function setShipmentCarrierCode($shipmentCarrierCode)
    {
        $this->setData(self::SHIPMENT_CARRIER_CODE, $shipmentCarrierCode);
    }

    public function getShipmentTrackNumber()
    {
        return $this->getData(self::SHIPMENT_TRACK_NUMBER);
    }

    public function setShipmentTrackNumber($shipmentTrackNumber)
    {
        $this->setData(self::SHIPMENT_TRACK_NUMBER, $shipmentTrackNumber);
    }

    public function getShipmentStatus()
    {
        return $this->getData(self::SHIPMENT_STATUS);
    }

    public function setShipmentStatus($shipmentStatus)
    {
        $this->setData(self::SHIPMENT_STATUS, $shipmentStatus);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
    }

}

