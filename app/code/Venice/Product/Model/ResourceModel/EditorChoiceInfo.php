<?php

namespace Venice\Product\Model\ResourceModel;

class EditorChoiceInfo extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('product_editor_choice_info', 'editor_id');
    }

}