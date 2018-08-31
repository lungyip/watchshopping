<?php

namespace Venice\Product\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Venice\Product\Api\Data\EditorChoiceNoteInterface;

class EditorChoiceNote extends AbstractModel implements IdentityInterface, EditorChoiceNoteInterface
{
    const CACHE_TAG = 'product_editor_choice_note';

    protected $_cacheTag = 'product_editor_choice_note';

    protected $_eventPrefix = 'product_editor_choice_note';

    protected function _construct()
    {
        $this->_init('Venice\Product\Model\ResourceModel\EditorChoiceNote');
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

    public function getNoteId()
    {
        return $this->getData(self::NOTE_ID);
    }

    public function getEditorId()
    {
        return $this->getData(self::EDITOR_ID);
    }

    public function setEditorId($editorId)
    {
        $this->setData(self::EDITOR_ID, $editorId);
    }

    public function getParentId()
    {
        return $this->getData(self::PARENT_ID);
    }

    public function setParentId($parentId)
    {
        $this->setData(self::PARENT_ID, $parentId);
    }

    public function getType()
    {
        return $this->getData(self::TYPE);
    }

    public function setType($type)
    {
        $this->setData(self::TYPE, $type);
    }

    public function getNoteTitle()
    {
        return $this->getData(self::NOTE_TITLE);
    }

    public function setNoteTitle($noteTitle)
    {
        $this->setData(self::NOTE_TITLE, $noteTitle);
    }

    public function getNoteDescription()
    {
        return $this->getData(self::NOTE_DESCRIPTION);
    }

    public function setNoteDescription($noteDescription)
    {
        $this->setData(self::NOTE_DESCRIPTION, $noteDescription);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus($status)
    {
        $this->setData(self::STATUS, $status);
    }

}

