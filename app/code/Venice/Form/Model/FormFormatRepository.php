<?php

namespace Venice\Form\Model;

use Magento\Store\Model\StoreManagerInterface;
use Venice\Form\Api\FormFormatRepositoryInterface;
use Venice\Form\Api\Data\FormFormatInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Venice\Form\Model\ResourceModel\FormFormat;

class FormFormatRepository implements FormFormatRepositoryInterface {

    protected $formFormatFactory;
    protected $storeManager;
    protected $formFormat;

    public function __construct(
        FormFormatFactory $formFormatFactory,
        StoreManagerInterface $storeManager,
        FormFormat $formFormat){

        $this->formFormatFactory = $formFormatFactory;
        $this->storeManager = $storeManager;
        $this->formFormat = $formFormat;
    }
    


    public function save(FormFormatInterface $FormFormat){

        try {
            $this->formFormat->save($FormFormat);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the venice_form_format: %1',
                $exception->getMessage()
            ));
        }
        return $FormFormat;
    }

    /**
     * @param int $specId
     * @return FormFormatInterface|null
     */
    public function getByFormatId($specId){
        $formFormat = $this->formFormatFactory->create();
        $data = $formFormat->load($specId);
        return $data;
    }

    /**
     * @param string $name
     * @return FormFormatInterface|null
     */
    public function getByName($name)
    {
        $formFormat = $this->formFormatFactory->create();
        $data = $formFormat->load($name, 'name');
        return $data;
    }
}
