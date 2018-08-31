<?php

namespace Venice\Checkout\Model\ResourceModel\OrderPayment;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'checkout_order_payment_collection';
    protected $_eventObject = 'order_payment_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Venice\Checkout\Model\OrderPayment', 'Venice\Checkout\Model\ResourceModel\OrderPayment');
    }

}

