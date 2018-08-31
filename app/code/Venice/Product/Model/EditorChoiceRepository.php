<?php


namespace Venice\Product\Model;

use Magento\Store\Model\StoreManagerInterface;
use Venice\Product\Api\Data\EditorChoiceInterface;
use Venice\Product\Api\EditorChoiceRepositoryInterface;
use Venice\Product\Api\Data\EditorChoiceInterfaceFactory;
use Venice\Product\Api\WatchSpecRepositoryInterface;
use \Magento\Catalog\Api\Data\ProductInterfaceFactory;
use Venice\Product\Model\ResourceModel\EditorChoice as ResourceNote;
use Magento\Framework\Exception\CouldNotSaveException;

class EditorChoiceRepository implements EditorChoiceRepositoryInterface
{

    protected $resource;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    protected $editorChoiceInterfaceFactory;

    protected $productInterfaceFactory;

    protected $watchSpecRepositoryInterface;

    public function __construct(
        ResourceNote $resource,
        StoreManagerInterface $storeManager,
        EditorChoiceInterfaceFactory $editorChoiceInterfaceFactory,
        ProductInterfaceFactory $productInterfaceFactory,
        WatchSpecRepositoryInterface $watchSpecRepositoryInterface

    ) {
        $this->resource                               = $resource;
        $this->storeManager                           = $storeManager;
        $this->editorChoiceInterfaceFactory           = $editorChoiceInterfaceFactory;
        $this->productInterfaceFactory                = $productInterfaceFactory;
        $this->watchSpecRepositoryInterface           = $watchSpecRepositoryInterface;
    }

    public function getByNoteId($noteId)
    {
        $choice = $this->editorChoiceInterfaceFactory->create()
            ->getCollection()
            ->addFieldToFilter('note_id', ['eq' => $noteId])
            ->load();
        return $choice;
    }

    public function getProductByFamily($brandId,$familyId)
    {
        $products = $this->productInterfaceFactory
            ->create()
            ->getCollection()
            ->addAttributeToFilter('family_id',array('eq'=>$familyId))
            ->addAttributeToFilter('brand_id',array('eq'=>$brandId))
            ->setVisibility(array(2,4))
            ->load();

        return $products->getItems();
    }

    public function getRefBySku($sku)
    {
        $ref = $this->watchSpecRepositoryInterface->getBySku($sku);
        return json_decode($ref->getData('detail'),true);

    }

    public function save(EditorChoiceInterface $choice)
    {
        try {
            $this->resource->save($choice);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the author: %1',
                $exception->getMessage()
            ));
        }

        return $choice;
    }

}
