<?php

namespace Venice\Product\Api\Data;

interface EditorChoiceInterface
{
    const ID                = 'choice_id';
    const EDITOR_ID         = 'editor_id';
    const CHOICE            = 'choice';

    public function getChoiceId();

    public function getNoteId();

    public function setNoteId($noteId);

    public function getChoice();

    public function setChoice($choice);

}

