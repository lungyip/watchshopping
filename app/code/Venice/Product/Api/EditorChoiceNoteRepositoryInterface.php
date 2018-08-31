<?php

namespace Venice\Product\Api;

use Venice\Product\Api\Data\EditorChoiceNoteInterface;

interface EditorChoiceNoteRepositoryInterface
{
    public function save(EditorChoiceNoteInterface $editorNote);

    public function getEditorChoiceByParentId($parentId,$type);

}
