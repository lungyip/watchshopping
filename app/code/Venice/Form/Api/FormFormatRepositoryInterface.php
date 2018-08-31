<?php

namespace Venice\Form\Api;
use Venice\Form\Api\Data\FormFormatInterface;

interface FormFormatRepositoryInterface{

    /**
     * Save form
     * @api
     * @param \Venice\Form\Api\Data\FormFormatInterface $FormFormat
     * @return \Venice\Form\Api\Data\FormFormatInterface
     */
    public function save(FormFormatInterface $FormFormat);

    /**
     * Get form by form format id.
     * @param int $formatId
     * @return \Venice\Form\Api\Data\FormFormatInterface
     */
    public function getByFormatId($formatId);

    /**
     * Get form by form format name.
     * @param string $name
     * @return \Venice\Form\Api\Data\FormFormatInterface
     */
    public function getByName($name);

}

