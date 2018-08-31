<?php

namespace Venice\Product\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Venice\Product\Api\EditorChoiceRepositoryInterface;
use Venice\Product\Api\EditorChoiceNoteRepositoryInterface;
use Venice\Product\Api\EditorChoiceInfoRepositoryInterface;
use Venice\Product\Api\FamilyRepositoryInterface;
use \Magento\Catalog\Api\ProductRepositoryInterface;

class EditorChoiceInfo extends Template
{

    protected $coreRegistry;

    protected $editorChoiceInfoRepository;
    protected $editorChoiceRepository;
    protected $editorChoiceNoteRepository;

    protected $familyRepository;
    protected $productRepository;


    public function __construct(
        Context $context,
        Registry $registry,
        EditorChoiceInfoRepositoryInterface $editorChoiceInfoRepository,
        EditorChoiceRepositoryInterface $editorChoiceRepository,
        EditorChoiceNoteRepositoryInterface $editorChoiceNoteRepository,
        ProductRepositoryInterface $productRepository,
        FamilyRepositoryInterface $familyRepository,

        array $data = []
    ) {
        $this->coreRegistry = $registry;
        $this->editorChoiceInfoRepository = $editorChoiceInfoRepository;
        $this->editorChoiceRepository = $editorChoiceRepository;
        $this->editorChoiceNoteRepository = $editorChoiceNoteRepository;
        $this->productRepository = $productRepository;
        $this->familyRepository = $familyRepository;
        parent::__construct($context, $data);
    }

    public function getCurrentEditorChoice()
    {
        $parentId = $this->coreRegistry->registry('current_brand')->getBrandId();
        $type = 0;
        if ($this->coreRegistry->registry('current_family')) {
            $parentId = $this->coreRegistry->registry('current_family')->getFamilyId();
            $type = 1;
        }
        $editor = $this->editorChoiceNoteRepository->getEditorChoiceByParentId($parentId,$type);
        return $editor;
    }

    public function getProduct($productId)
    {
        return $this->productRepository->getById($productId);
    }

    public function getFamily($familyId)
    {
        return $this->familyRepository->getById($familyId);
    }

    public function getChoice($noteId)
    {
        return $this->editorChoiceRepository->getByNoteId($noteId);
    }

    public function getChoiceObjByType($choice,$type)
    {
        return $type?$this->productRepository->getById($choice):$this->familyRepository->getById($choice);
    }

    public function getProductByFamily($brandId,$familyId)
    {
        return $this->editorChoiceRepository->getProductByFamily($brandId,$familyId);
    }

    public function getRefBySku($sku)
    {
        $data=$this->editorChoiceRepository->getRefBySku($sku);
        return $data['watch']['reference_number'];
    }

}



