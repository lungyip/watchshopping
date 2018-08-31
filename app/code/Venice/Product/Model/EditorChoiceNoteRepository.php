<?php


namespace Venice\Product\Model;

use Magento\Store\Model\StoreManagerInterface;
use Venice\Product\Api\Data\EditorChoiceNoteInterface;
use Venice\Product\Api\EditorChoiceNoteRepositoryInterface;
use Venice\Product\Api\Data\EditorChoiceNoteInterfaceFactory;
use Venice\Product\Model\ResourceModel\EditorChoiceNote as ResourceNote;
use Magento\Framework\Exception\CouldNotSaveException;

class EditorChoiceNoteRepository implements EditorChoiceNoteRepositoryInterface
{

    protected $resource;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    protected $EditorChoiceNoteInterfaceFactory;

    protected $collection;


    public function __construct(
        ResourceNote $resource,
        StoreManagerInterface $storeManager,
        EditorChoiceNoteInterfaceFactory $editorChoiceNoteInterfaceFactory
    )
    {
        $this->resource = $resource;
        $this->storeManager = $storeManager;
        $this->editorChoiceNoteInterfaceFactory = $editorChoiceNoteInterfaceFactory;
    }

    public function getEditorChoiceByParentId($parentId, $type)
    {
        $editorNote = $this->editorChoiceNoteInterfaceFactory
            ->create()
            ->getCollection()
            ->addFieldToFilter('type', $type)
            ->addFieldToFilter('parent_id', $parentId)
            ->getFirstItem();

        return $editorNote;
    }

    public function save(EditorChoiceNoteInterface $editorNote)
    {
        try {
            $this->resource->save($editorNote);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the author: %1',
                $exception->getMessage()
            ));
        }

        return $editorNote;
    }


}