<?php

namespace Venice\Checkout\Api\Data;

interface OrderProductInterface
{
    const ENTITY_ID                 = 'entity_id';
    const ORDER_ID                  = 'order_id';
    const PRODUCT_ID                = 'product_id';
    const SERIAL_NUMBER             = 'serial_number';
    const SKU                       = 'sku';
    const NAME                      = 'name';
    const PRICE                     = 'price';

    const TAX_PERCENT               = 'tax_percent';
    const TAX_AMOUNT                = 'tax_amount';
    const DISCOUNT_AMOUNT           = 'discount_amount';
    const BASE_PRICE_INCL_TAX       = 'base_price_incl_tax';
    const CREATED_AT                = 'created_at';
    const UPDATED_AT                = 'updated_at';


    public function getEntityId();

    public function setEntityId($entityId);

    public function getOrderId();

    public function setOrderId($orderId);

    public function getProductId();

    public function setProductId($productId);

    public function getSerialNumber();

    public function setSerialNumber($serialNumber);


    public function getSku();

    public function setSku($sku);

    public function getName();

    public function setName($name);

    public function getPrice();

    public function setPrice($price);


    public function getTaxPercent();

    public function setTaxPercent($taxPercent);

    public function getTaxAmount();

    public function setTaxAmount($taxAmount);

    public function getDiscountAmount();

    public function setDiscountAmount($discountAmount);

    public function getBasePriceInclTax();

    public function setBasePriceInclTax($basePriceInclTax);


    public function getCreatedAt();

    public function setCreatedAt($createdAt);

    public function getUpdatedAt();

    public function setUpdatedAt($updatedAt);

}

