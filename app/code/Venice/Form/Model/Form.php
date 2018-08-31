<?php
namespace Venice\Form\Model;
use Venice\Form\Api\Data\FormInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Form extends AbstractModel implements IdentityInterface,FormInterface
{

    const CACHE_TAG = 'Venice_form_form';

    protected $_cacheTag = 'Venice_form_form';

    protected $_eventPrefix = 'Venice_form_form';

    protected function _construct()
    {
        $this->_init('Venice\Form\Model\ResourceModel\Form');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getFormId(){
        return $this->getData(self::FORM_ID);
    }

    public function setFormId($id){
        return $this->setData(self::FORM_ID,$id);
    }

    public function getFormatId(){
        return $this->getData(self::FORMAT_ID);
    }

    public function setFormatId($id){
        return $this->setData(self::FORMAT_ID,$id);
    }

    public function getCustomerId(){
        return $this->getData(self::CUSTOMER_ID);
    }

    public function setCustomerId($customerId){
        return $this->setData(self::CUSTOMER_ID,$customerId);
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
        return $this->setData(self::CREATED_AT,$date);
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
