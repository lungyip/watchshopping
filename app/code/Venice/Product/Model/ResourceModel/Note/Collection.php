<?php

namespace Venice\Product\Model\ResourceModel\Note;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'note_id';
    protected $_eventPrefix = 'product_editor_note_collection';
    protected $_eventObject = 'editor_note_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Venice\Product\Model\Note', 'Venice\Product\Model\ResourceModel\Note');
    }

}

