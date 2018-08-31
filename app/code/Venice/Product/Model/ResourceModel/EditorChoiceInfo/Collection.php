<?php

namespace Venice\Product\Model\ResourceModel\EditorChoiceInfo;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'editor_id';
    protected $_eventPrefix = 'product_editor_choice_info_collection';
    protected $_eventObject = 'editor_choice_info_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Venice\Product\Model\EditorChoiceInfo', 'Venice\Product\Model\ResourceModel\EditorChoiceInfo');
    }

}

