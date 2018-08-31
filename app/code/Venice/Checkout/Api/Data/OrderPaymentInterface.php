<?php

namespace Venice\Checkout\Api\Data;

interface OrderPaymentInterface
{
    const ENTITY_ID                 = 'entity_id';
    const ORDER_ID                  = 'order_id';
    const INCREMENT_ID              = 'increment_id';
    const ORDER_CURRENCY_CODE       = 'order_currency_code';
    const BASE_GRAND_TOTAL          = 'base_grand_total';
    const BASE_SUBTOTAL             = 'base_subtotal';
    const BASE_TAX_AMOUNT           = 'base_tax_amount';
    const BASE_SHIPPING_AMOUNT      = 'base_shipping_amount';
    const BASE_DISCOUNT_AMOUNT      = 'base_discount_amount';

    const DISCOUNT_DESCRIPTION      = 'discount_description';
    const CUSTOMER_ID               = 'customer_id';
    const CUSTOMER_EMAIL            = 'customer_email';
    const CUSTOMER_FIRSTNAME        = 'customer_firstname';
    const CUSTOMER_LASTNAME         = 'customer_lastname';
    const CUSTOMER_GROUP_ID         = 'customer_group_id';
    const CUSTOMER_IS_GUEST         = 'customer_is_guest';
    const REMOTE_IP                 = 'remote_ip';

    const MAGENTO_STATUS            = 'magento_status';
    const ORDER_STATUS              = 'order_status';
    const STORE_ID                  = 'store_id';
    const STORE_NAME                = 'store_name';
    const TOTAL_ITEM_COUNT          = 'total_item_count';
    const BASE_TOTAL_PAID           = 'base_total_paid';
    const PAYMENT_CODE              = 'payment_code';

    const SHIPMENT_CARRIER_CODE     = 'shipment_carrier_code';
    const SHIPMENT_TRACK_NUMBER     = 'shipment_track_number';
    const SHIPMENT_STATUS           = 'shipment_status';
    const CREATED_AT                = 'created_at';
    const UPDATED_AT                = 'updated_at';


    public function getEntityId();

    public function setEntityId($entityId);

    public function getOrderId();

    public function setOrderId($orderId);

    public function getIncrementId();

    public function setIncrementId($incrementId);

    public function getOrderCurrencyCode();

    public function setOrderCurrencyCode($orderCurrencyCode);

    public function getBaseGrandTotal();

    public function setBaseGrandTotal($baseGrandTotal);

    public function getBaseSubtotal();

    public function setBaseSubtotal($baseSubtotal);

    public function getBaseTaxAmount();

    public function setBaseTaxAmount($baseTaxAmount);

    public function getBaseShippingAmount();

    public function setBaseShippingAmount($baseShippingAmount);

    public function getBaseDiscountAmount();

    public function setBaseDiscountAmount($baseDiscountAmount);


    public function getDiscountDescription();

    public function setDiscountDescription($discountDescription);

    public function getCustomerId();

    public function setCustomerId($customerId);

    public function getCustomerEmail();

    public function setCustomerEmail($customerEmail);

    public function getCustomerFirstname();

    public function setCustomerFirstname($customerFirstname);

    public function getCustomerLastname();

    public function setCustomerLastname($customerLastname);

    public function getCustomerGroupId();

    public function setCustomerGroupId($customerGroupId);

    public function getCustomerIsGuest();

    public function setCustomerIsGuest($customerIsGuest);

    public function getRemoteIp();

    public function setRemoteIp($remoteIp);


    public function getMagentoStatus();

    public function setMagentoStatus($magentoStatus);

    public function getOrderStatus();

    public function setOrderStatus($orderStatus);

    public function getStoreId();

    public function setStoreId($storeId);

    public function getStoreName();

    public function setStoreName($storeName);

    public function getTotalItemCount();

    public function setTotalItemCount($totalItemCount);

    public function getBaseTotalPaid();

    public function setBaseTotalPaid($baseTotalPaid);

    public function getPaymentCode();

    public function setPaymentCode($paymentCode);

    public function getShipmentCarrierCode();

    public function setShipmentCarrierCode($shipmentCarrierCode);

    public function getShipmentTrackNumber();

    public function setShipmentTrackNumber($shipmentTrackNumber);

    public function getShipmentStatus();

    public function setShipmentStatus($shipmentStatus);

    public function getCreatedAt();

    public function setCreatedAt($createdAt);

    public function getUpdatedAt();

    public function setUpdatedAt($updatedAt);

}

