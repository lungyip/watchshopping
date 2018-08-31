<?php

namespace Venice\Product\Model\ResourceModel\EditorChoice;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'choice_id';
    protected $_eventPrefix = 'product_editor_choice_collection';
    protected $_eventObject = 'editor_choice_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Venice\Product\Model\EditorChoice', 'Venice\Product\Model\ResourceModel\EditorChoice');
    }

}

