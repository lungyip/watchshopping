<?php
namespace Venice\Form\Model\ResourceModel\FormFormat;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Venice\Form\Model\FormFormat', 'Venice\Form\Model\ResourceModel\FormFormat');
    }
}

?>