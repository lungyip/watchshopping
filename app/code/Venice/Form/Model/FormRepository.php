<?php

namespace Venice\Form\Model;

use Magento\Store\Model\StoreManagerInterface;
use Venice\Form\Api\FormRepositoryInterface;
use Venice\Form\Api\Data\FormInterface;
use Venice\Form\Api\Data\FormInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Venice\Form\Model\ResourceModel\Form;

class FormRepository implements FormRepositoryInterface {

    protected $formInterfaceFactory;
    protected $storeManager;
    protected $formObject;

    public function __construct(
        FormInterfaceFactory $formInterfaceFactory,
        StoreManagerInterface $storeManager,
        Form $formObject){

        $this->formInterfaceFactory = $formInterfaceFactory;
        $this->storeManager = $storeManager;
        $this->formObject = $formObject;
    }
    


    public function save(FormInterface $formDate){

        try {
            $this->formObject->save($formDate);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the venice_form_form: %1',
                $exception->getMessage()
            ));
        }
        return $formDate;
    }

    
    /**
     * @param int $formId
     * @return FormInterface|null
     */
    public function getByFormId($formId){
        $form = $this->formInterfaceFactory->create();
        $data = $form->load($formId);

        return $data;
    }

    /**
     * @param int $formatId
     * @return FormInterface|null
     */
    public function getByFormatId($formatId){
        $data = $this->formInterfaceFactory->create()->getCollection()->addFieldToFilter('format_id',$formatId);
        return $data;
    }

    /**
     * @param int $customerId
     * @return FormInterface|null
     */
    public function getByCustomerId($customerId){

        $data = $this->formInterfaceFactory->create()->getCollection()->addFieldToFilter('customer_id', $customerId);
        return $data;
    }
}
