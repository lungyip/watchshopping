<?php

namespace Venice\Form\Controller\Upload;

use Magento\Framework\App\Action\Context;
use Venice\Form\Model\FormFormatRepository;
use Venice\Form\Api\FormRepositoryInterface;
use Venice\Form\Model\Form;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Store\Model\StoreManagerInterface;


class Index extends \Magento\Framework\App\Action\Action
{
    protected $formRepositoryInterface;

    protected $formFormatRepository;

    protected $formObject;

    protected $formKeyValidator;

    protected $storeManager;

    /**
     * @param Context $context
     * @param FormRepositoryInterface $formRepositoryInterface
     * @param FormFormatRepository $formFormatRepository
     * @param Form $formObject
     * @param Validator $formKeyValidator
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        FormRepositoryInterface $formRepositoryInterface,
        FormFormatRepository $formFormatRepository,
        Form $formObject,
        Validator $formKeyValidator,
        StoreManagerInterface $storeManager
    )
    {
        $this->formRepositoryInterface = $formRepositoryInterface;
        $this->formFormatRepository = $formFormatRepository;
        $this->formObject = $formObject;
        $this->formKeyValidator = $formKeyValidator;
        $this->storeManager = $storeManager;
        return parent::__construct($context);
    }


    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $formName = $this->getRequest()->getParam("form_name");

        if (!$this->formKeyValidator->validate($this->getRequest())) {
            $resultRedirect->setUrl('/'.$formName);
        }

        $formatId = $this->formFormatRepository->getByName($formName)->getFormatId();

        $formatEmail = $this->formFormatRepository->getByName($formName)->getEmail();

        $storeId = $this->formFormatRepository->getByName($formName)->getStoreId();

        $baseUrl = $this->storeManager->getStore()->getBaseUrl();

        $imageUrls = [];

        if (!empty($_FILES)) {
            foreach($_FILES['file']['tmp_name'] as $key => $value) {
                $tempFile = $_FILES['file']['tmp_name'][$key];
                $tempName = $_FILES['file']['name'][$key];
                $tempFileSubFolder = substr($tempName, 0, 2);
                $storeFolder = 'media/upload/';
                if(!file_exists($storeFolder) && !is_dir($storeFolder)) {
                    mkdir($storeFolder);
                }
                $storeFolder = 'media/upload/'.$formName;
                if(!file_exists($storeFolder) && !is_dir($storeFolder)) {
                    mkdir($storeFolder);
                }
                $storeFolder = 'media/upload/'.$formName.'/'.$tempFileSubFolder.'/';
                if(!file_exists($storeFolder) && !is_dir($storeFolder)) {
                    mkdir($storeFolder);
                }
                $targetFile =  $storeFolder. $_FILES['file']['name'][$key];
                move_uploaded_file($tempFile,$targetFile);
                array_push($imageUrls, $targetFile);
            }
        }


        $customerId = $this->getRequest()->getParam("customer_id");

        $form = $this->formFormatRepository->getByFormatId($formatId)->getDetail();;
        $formArray = json_decode($form);

        $posts = (array)$this->getRequest()->getPost();

        unset($posts['form_key']);
        unset($posts['form_name']);
        unset($posts['customerId']);

        $matches = true;
        if (!empty($posts)) {
            foreach ($formArray as $array) {
                foreach ($array->fields as $field) {
                    $name = $field->name;

                    if (isset($field->patterns)) {
                        $pattern = $field->patterns;
                        foreach ($posts as $key => $value) {
                            if ($key === $name) {
                                if (!preg_match('/' . $pattern . '/', $value)) {
                                    $matches = false;
                                }
                            }
                        }
                    }
                }
            }
        }else{
            return $resultRedirect->setUrl($baseUrl);
        }
        if (!$matches){
            $resultRedirect->setUrl('/'.$formName);
        } else {
            $detail = json_encode($posts);
            $obj = $this->formObject;
            $obj->setFormatId($formatId);
            $obj->setCustomerId($customerId);
            $obj->setStoreId($storeId);
            $obj->setDetail($detail);
            $this->formRepositoryInterface->save($obj);

            $postFormat ="";
            foreach ($posts as $key => $value){
                if (is_array($value)){
                    $postFormat .= "$key:";
                    foreach($value as $id => $option) {
                        $postFormat .= "$option"." ";
                    }
                    $postFormat .= "\n";
                }
                else {
                    $postFormat .= "$key:$value" . "\n";
                }
            }
            if (is_array($imageUrls)) {
                foreach ($imageUrls as $imageUrl) {
                    $postFormat .= $baseUrl . $imageUrl . "\n";
                }
            }

            $to      = $formatEmail;
            $subject =  $formName;
            $message = $postFormat;
            mail($to, $subject, $message);

            $resultRedirect->setUrl('/success');

        }
        return $resultRedirect;
        }
    }
