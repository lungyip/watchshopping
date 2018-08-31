<?php

namespace Venice\Checkout\Model\ResourceModel\OrderProduct;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'checkout_order_product_collection';
    protected $_eventObject = 'order_product_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Venice\Checkout\Model\OrderProduct', 'Venice\Checkout\Model\ResourceModel\OrderProduct');
    }

}
