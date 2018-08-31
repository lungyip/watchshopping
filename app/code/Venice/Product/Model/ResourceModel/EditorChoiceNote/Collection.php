<?php

namespace Venice\Product\Model\ResourceModel\EditorChoiceNote;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'note_id';
    protected $_eventPrefix = 'product_editor_choice_note_collection';
    protected $_eventObject = 'editor_choice_note_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Venice\Product\Model\EditorChoiceNote', 'Venice\Product\Model\ResourceModel\EditorChoiceNote');
    }

     protected function _initSelect()
     {
         parent::_initSelect();

         $this->getSelect()
             ->join(
                 ['info' => 'product_editor_choice_info'],
                 'info.editor_id = main_table.editor_id',
                 ['first_name','last_name','catalog','image','info_status'=>'status']
             );
     }
}

