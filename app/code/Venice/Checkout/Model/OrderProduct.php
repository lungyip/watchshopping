<?php

namespace Venice\Checkout\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Venice\Checkout\Api\Data\OrderProductInterface;

class OrderProduct extends AbstractModel implements IdentityInterface, OrderProductInterface
{
    const CACHE_TAG = 'checkout_order_product';

    protected $_cacheTag = 'checkout_order_product';

    protected $_eventPrefix = 'checkout_order_product';

    protected function _construct()
    {
        $this->_init('Venice\Checkout\Model\ResourceModel\OrderProduct');
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

    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    public function setProductId($productId)
    {
        $this->setData(self::PRODUCT_ID, $productId);
    }

    public function getSerialNumber()
    {
        return $this->getData(self::SERIAL_NUMBER);
    }

    public function setSerialNumber($serialNumber)
    {
        $this->setData(self::SERIAL_NUMBER, $serialNumber);
    }

    public function getSku()
    {
        return $this->getData(self::SKU);
    }

    public function setSku($sku)
    {
        $this->setData(self::SKU, $sku);
    }

    public function getName()
    {
        return $this->getData(self::ORDER_ID);
    }

    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    public function getPrice()
    {
        return $this->getData(self::PRICE);
    }

    public function setPrice($price)
    {
        $this->setData(self::PRICE, $price);
    }

    public function getQtyOrdered()
    {
        return $this->getData(self::QTY_ORDERED);
    }

    public function setQtyOrdered($qtyOrdered)
    {
        $this->setData(self::QTY_ORDERED, $qtyOrdered);
    }

    public function getTaxPercent()
    {
        return $this->getData(self::TAX_PERCENT);
    }

    public function setTaxPercent($taxPercent)
    {
        $this->setData(self::TAX_PERCENT, $taxPercent);
    }

    public function getTaxAmount()
    {
        return $this->getData(self::TAX_AMOUNT);
    }

    public function setTaxAmount($taxAmount)
    {
        $this->setData(self::TAX_AMOUNT, $taxAmount);
    }

    public function getDiscountAmount()
    {
        return $this->getData(self::DISCOUNT_AMOUNT);
    }

    public function setDiscountAmount($discountAmount)
    {
        $this->setData(self::DISCOUNT_AMOUNT, $discountAmount);
    }

    public function getBasePriceInclTax()
    {
        return $this->getData(self::BASE_PRICE_INCL_TAX);
    }

    public function setBasePriceInclTax($basePriceInclTax)
    {
        $this->setData(self::BASE_PRICE_INCL_TAX, $basePriceInclTax);
    }

    public function getBaseRowTotal()
    {
        return $this->getData(self::BASE_ROW_TOTAL);
    }

    public function setBaseRowTotal($baseRowTotal)
    {
        $this->setData(self::BASE_ROW_TOTAL, $baseRowTotal);
    }

    public function getBaseRowTotalInclTax()
    {
        return $this->getData(self::BASE_ROW_TOTAL_INCL_TAX);
    }

    public function setBaseRowTotalInclTax($baseRowTotalInclTax)
    {
        $this->setData(self::BASE_ROW_TOTAL_INCL_TAX, $baseRowTotalInclTax);
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

