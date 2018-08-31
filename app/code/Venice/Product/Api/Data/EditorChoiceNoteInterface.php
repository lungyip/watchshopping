<?php

namespace Venice\Product\Api\Data;

interface EditorChoiceNoteInterface
{
    const NOTE_ID           = 'note_id';
    const EDITOR_ID         = 'editor_id';
    const PARENT_ID         = 'parent_id';
    const TYPE              = 'type';
    const NOTE_TITLE        = 'note_title';
    const NOTE_DESCRIPTION  = 'note_description';
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';
    const STATUS            = 'status';

    public function getNoteId();

    public function getEditorId();

    public function setEditorId($editorId);

    public function getParentId();

    public function setParentId($parentId);

    public function getType();

    public function setType($type);

    public function getNoteTitle();

    public function setNoteTitle($noteTitle);

    public function getNoteDescription();

    public function setNoteDescription($noteDescription);

    public function getCreatedAt();

    public function getUpdatedAt();

    public function getStatus();

    public function setStatus($status);

}

