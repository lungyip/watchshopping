<?php


namespace Venice\Product\Model;

use Magento\Store\Model\StoreManagerInterface;
use Venice\Product\Api\Data\EditorChoiceInfoInterface;
use Venice\Product\Api\EditorChoiceInfoRepositoryInterface;
use Venice\Product\Api\Data\EditorChoiceInfoInterfaceFactory;
use Venice\Product\Model\ResourceModel\EditorChoiceInfo as ResourceNote;
use Magento\Framework\Exception\CouldNotSaveException;

class EditorChoiceInfoRepository implements EditorChoiceInfoRepositoryInterface
{

    protected $resource;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    protected $editorChoiceInfoInterfaceFactory;


    public function __construct(
        ResourceNote $resource,
        StoreManagerInterface $storeManager,
        editorChoiceInfoInterfaceFactory $editorChoiceInfoInterfaceFactory
    ) {
        $this->resource                               = $resource;
        $this->storeManager                           = $storeManager;
        $this->editorChoiceInfoInterfaceFactory       = $editorChoiceInfoInterfaceFactory;
    }

    public function save(EditorChoiceInfoInterface $editor)
    {
        try {
            $this->resource->save($editor);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the author: %1',
                $exception->getMessage()
            ));
        }

        return $editor;
    }

}
