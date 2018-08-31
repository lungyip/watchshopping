<?php

namespace Venice\Product\Api;

use Venice\Product\Api\Data\NoteInterface;

/**
 * Interface NoteRepositoryInterface
 * @package Venice\Product\Api
 */
interface NoteRepositoryInterface
{
    public function getByProductId($productId);

    public function save(NoteInterface $note);
}
