<?php

namespace Venice\Form\Controller\Index;

use Magento\Framework\App\Action\Context;



class Index extends \Magento\Framework\App\Action\Action
{

    public function __construct(
        Context $context
    )
    {
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setUrl('/success-page');
        return $resultRedirect;
    }
}
