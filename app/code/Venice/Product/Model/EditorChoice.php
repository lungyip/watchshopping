<?php

namespace Venice\Product\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Venice\Product\Api\Data\EditorChoiceInterface;

class EditorChoice extends AbstractModel implements IdentityInterface, EditorChoiceInterface
{
    const CACHE_TAG = 'product_editor_choice';

    protected $_cacheTag = 'product_editor_choice';

    protected $_eventPrefix = 'product_editor_choice';

    protected function _construct()
    {
        $this->_init('Venice\Product\Model\ResourceModel\EditorChoice');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }

    public function getChoiceId()
    {
        return $this->getData(self::CHOICE_ID);
    }

    public function getNoteId()
    {
        return $this->getData(self::NOTE_ID);
    }

    public function setNoteId($noteId)
    {
        return $this->setData(self::NOTE_ID,$noteId);
    }

    public function getChoice()
    {
        return $this->getData(self::CHOICE);
    }

    public function setChoice($choice)
    {
        $this->setData(self::CHOICE, $choice);
    }
}

