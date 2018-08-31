<?php

namespace Venice\Product\Api\Data;

interface EditorChoiceInfoInterface
{
    const EDITOR_ID         = 'editor_id';
    const FIRST_NAME        = 'first_name';
    const LAST_NAME         = 'last_name';
    const CATALOG           = 'catalog';
    const IMAGE             = 'image';

    public function getEditorId();

    public function getFirstName();

    public function setFirstName($firstName);

    public function getLastName();

    public function setLastName($lastName);

    public function getCatalog();

    public function setCatalog($catalog);

    public function getImage();

    public function setImage($image);

    public function getStatus();

    public function setStatus($status);

}

