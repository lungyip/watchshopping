<?php
namespace Venice\Form\Model;
use Venice\Form\Api\Data\FormFormatInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class FormFormat extends AbstractModel implements IdentityInterface,FormFormatInterface
{
    
    const CACHE_TAG = 'venice_form_format';

    protected $_cacheTag = 'venice_form_format';

    protected $_eventPrefix = 'venice_form_format';

    protected function _construct()
    {
        $this->_init('Venice\Form\Model\ResourceModel\FormFormat');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    
    public function getFormatId(){
        return $this->getData(self::FORMAT_ID);
    }

    public function setFormatId($id){
        return $this->setData(self::FORMAT_ID,$id);
    }

    public function getName(){
        return $this->getData(self::NAME);
    }

    public function setName($name){
        return $this->setData(self::NAME,$name);
    }

    public function getEmail(){
        return $this->getData(self::EMAIL);
    }

    public function setEmail($email){
        return $this->setData(self::EMAIL,$email);
    }

    public function getStatus(){
        return $this->getData(self::STATUS);
    }

    public function setStatus($status){
        return $this->setData(self::STATUS,$status);
    }

    public function getStoreId(){
        return $this->getData(self::STORE_ID);
    }

    public function setStoreId($storeId){
        return $this->setData(self::STORE_ID,$storeId);
    }

    public function getCreatedAt(){
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($date){
        return $this->setData(self::STORE_ID,$date);
    }

    public function getUpdatedAt(){
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($date){
        return $this->setData(self::UPDATED_AT,$date);
    }

    public function getDetail(){
        return $this->getData(self::DETAIL);
    }

    public function setDetail($detail){
        return $this->setData(self::DETAIL,$detail);
    }

}
