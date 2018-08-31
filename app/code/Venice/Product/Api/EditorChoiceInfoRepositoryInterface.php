<?php

namespace Venice\Product\Api;

use Venice\Product\Api\Data\EditorChoiceInfoInterface;

interface EditorChoiceInfoRepositoryInterface
{
    public function save(EditorChoiceInfoInterface $editor);
}
