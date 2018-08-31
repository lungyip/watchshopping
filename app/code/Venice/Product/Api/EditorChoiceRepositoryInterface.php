<?php

namespace Venice\Product\Api;

use Venice\Product\Api\Data\EditorChoiceInterface;

interface EditorChoiceRepositoryInterface
{
    public function getByNoteId($noteId);

    public function save(EditorChoiceInterface $choice);

    public function getProductByFamily($brandId,$familyId);

    public function getRefBySku($sku);
}
