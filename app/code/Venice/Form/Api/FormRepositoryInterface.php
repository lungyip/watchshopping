<?php

namespace Venice\Form\Api;
use Venice\Form\Api\Data\FormInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface FormRepositoryInterface{

    /**
     * Save form
     * @api
     * @param \Venice\Form\Api\Data\FormInterface $Form
     * @return \Venice\Form\Api\Data\FormInterface
     */
    public function save(FormInterface $Form);

    /**
     * Get form by form id.
     * @param int $formId
     * @return \Venice\Form\Api\Data\FormInterface
     */
    public function getByFormId($formId);


    /**
     * Get form by form format id.
     * @param string $formatId
     * @return \Venice\Form\Api\Data\FormFormatInterface
     */
    public function getByFormatId($formatId);

    /**
     * Get form by form customer id.
     * @param int $customerId
     * @return \Venice\Form\Api\Data\FormFormatInterface
     */
    public function getByCustomerId($customerId);

}

