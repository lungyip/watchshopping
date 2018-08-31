<?php

namespace Venice\Product\Observer;
use Magento\Framework\Event\ObserverInterface;
use Venice\Product\Api\NoteRepositoryInterface;

class ProductSaveAfter implements ObserverInterface
{
    /**
     * @var NoteRepositoryInterface
     */
    protected $noteRepository;

    /**
     * @param NoteRepositoryInterface $noteRepository
     */
    public function __construct(
        NoteRepositoryInterface $noteRepository
    ) {
        $this->noteRepository = $noteRepository;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getProduct();  // you will get product object
        $productId = $product->getId();
        $note = $this->noteRepository->getByProductId($productId);

        if (!$note->getProductId()) {
            $note->setProductId($productId);
        }

        $title = $product->getData('editor_note_title_text');
        $desc = $product->getData('editor_note_desc_text');
        $display = (int)$product->getData('is_editor_note_display');
        $note->setStatus($display);
        $note->setTitle($title);
        $note->setDescription($desc);

        $this->noteRepository->save($note);
    }
}
