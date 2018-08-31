<?php

namespace Venice\Checkout\Model\ResourceModel;

class OrderPayment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('order_payment', 'entity_id');
    }

}

