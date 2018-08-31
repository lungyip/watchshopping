<?php

namespace Venice\Product\Block;

use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Http\Context as HttpContext;

class FooterLogout extends Template
{

    protected $_session;
    protected $_httpContext;

    public function __construct(
        Context $context,
        Session $session,
        HttpContext $httpContext,
        array $data = []
    )
    {
        $this->_session = $session;
        $this->_httpContext = $httpContext;
        parent::__construct($context, $data);
    }

    public function isCustomerLoggedIn(){
       $isLoggedIn = $this->_httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
       return $isLoggedIn;
    }


}