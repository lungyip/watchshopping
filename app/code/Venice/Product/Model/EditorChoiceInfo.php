<?php

namespace Venice\Product\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Venice\Product\Api\Data\EditorChoiceInfoInterface;

class EditorChoiceInfo extends AbstractModel implements IdentityInterface, EditorChoiceInfoInterface
{
    const CACHE_TAG = 'product_editor_choice_info';

    protected $_cacheTag = 'product_editor_choice_info';

    protected $_eventPrefix = 'product_editor_choice_info';

    protected function _construct()
    {
        $this->_init('Venice\Product\Model\ResourceModel\EditorChoiceInfo');
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

    public function getEditorId()
    {
        return $this->getData(self::EDITOR_ID);
    }

    public function getFirstName()
    {
        return $this->getData(self::FIRST_NAME);
    }

    public function setFirstName($firstName)
    {
        $this->setData(self::FIRST_NAME, $firstName);
    }

    public function getLastName()
    {
        return $this->getData(self::LAST_NAME);
    }

    public function setLastName($lastName)
    {
        $this->setData(self::LAST_NAME, $lastName);
    }

    public function getCatalog()
    {
        return $this->getData(self::CATALOG);
    }

    public function setCatalog($catalog)
    {
        $this->setData(self::CATALOG, $catalog);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus($status)
    {
        $this->setData(self::STATUS, $status);
    }

    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    public function setImage($image)
    {
        $this->setData(self::IMAGE, $image);
    }

}

