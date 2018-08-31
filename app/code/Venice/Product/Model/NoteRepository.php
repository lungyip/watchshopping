<?php


namespace Venice\Product\Model;

use Venice\Product\Api\Data\NoteInterface;
use Venice\Product\Api\NoteRepositoryInterface;
use Venice\Product\Api\Data\NoteInterfaceFactory;
use Venice\Product\Model\ResourceModel\Note as ResourceNote;
use Magento\Framework\Exception\CouldNotSaveException;

class NoteRepository implements NoteRepositoryInterface
{

    protected $resource;

    protected $noteInterfaceFactory;

    public function __construct(
        ResourceNote $resource,
        NoteInterfaceFactory $noteInterfaceFactory
    ) {
        $this->resource                 = $resource;
        $this->noteInterfaceFactory     = $noteInterfaceFactory;
    }

    public function getByProductId($productId)
    {
        /** @var NoteInterface|\Magento\Framework\Model\AbstractModel $note */
        $note = $this->noteInterfaceFactory->create();
        $this->resource->load($note, $productId, 'product_id');
        return $note;
    }

    public function save(NoteInterface $note)
    {
        /** @var NoteInterface|\Magento\Framework\Model\AbstractModel $note */
        try {
            $this->resource->save($note);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the author: %1',
                $exception->getMessage()
            ));
        }

        return $note;
    }

}
