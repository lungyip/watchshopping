<?php

namespace Venice\Product\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\CategoryFactory;

/* TODO change to use category EAV to determine to first parent to show for the leaf node */

class FindMore extends Template
{
    protected $_registry;
    protected $_categoryFactory;
    protected $_attribute;

    public function __construct(
        Context $context,
        Registry $registry,
        CategoryFactory $categoryFactory,

        array $data = []
    )
    {
        $this->_registry = $registry;
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }


    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }

    public function getCategoryName($categoryId)
    {

        // load category
        $category = $this->_categoryFactory->create()->load($categoryId);
        // determine level of category
        $categoryLevel = intval($category->getLevel());
        // find the parent of current category
        $categoryParent = $category->getParentCategory();
        // find the level of parent of current category
        $levelParent = intval($categoryParent->getLevel());


        //look up parent up till level 2
        while ($levelParent >2) {
            $categoryParent = $categoryParent->getParentCategory();
            $levelParent = $categoryParent->getLevel();
        }

        // create a data object to store the result
        $object = new \Magento\Framework\DataObject();
        $object->setParentName($categoryParent->getName());
        $object->setCategoryUrl($category->getUrl());
        $object->setName($category->getName());

        // if parent is level 1 or level 0 , do not show
        if ($levelParent <=1){
            $object->setParentStatus(0);
        }

        // skip level 3
        if ($categoryLevel == 3 ){
            $object->setStatus(0);
        }

        return $object;
    }

}