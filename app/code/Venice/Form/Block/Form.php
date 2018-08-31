<?php

namespace Venice\Form\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Cms\Model\Page;
use \Venice\Form\Model\FormFormatRepository;
use \Magento\Customer\Model\Session;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Framework\Data\Form\FormKey;

class form extends Template
{
    protected $storeManager;
    protected $pageFormName;
    protected $formFormatRepository;
    protected $customerSession;
    protected $formKey;


    public function __construct(Context $context,
                                Page $pageFormName,
                                StoreManagerInterface $storeManager,
                                FormFormatRepository $formFormatRepository,
                                Session $customerSession,
                                FormKey $formKey
    )
    {
        $this->pageFormName = $pageFormName;
        $this->storeManager = $storeManager;
        $this->formFormatRepository = $formFormatRepository;
        $this->customerSession = $customerSession;
        $this->formKey = $formKey;
        parent::__construct($context);
    }

    public function getBaseUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl();
    }

    public function getStoreId()
    {
        return $this->storeManager->getStore()->getId();
    }

    public function getCurrentPageId()
    {
        return $this->pageFormName->getId();
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    public function getName(){
        return $this->pageFormName->getIdentifier();
    }

    public function getCustomerId(){

        if($this->customerSession->isLoggedIn()){
            return $this->customerSession->getCustomerId();
        }
        return null;
    }

    public function getFormDetail(){

        $pageName = $this->pageFormName->getIdentifier();
        $formDetail = $this->formFormatRepository->getByName($pageName)->getDetail();
        $formArray = json_decode($formDetail);
        return $formArray;

    }



}