<?php

namespace Venice\Form\Api\Data;
use Magento\Framework\Api\ExtensibleDataInterface;


interface FormInterface extends ExtensibleDataInterface
{

    const FORM_ID = 'form_id';
    const FORMAT_ID = 'format_id';
    const CUSTOMER_ID = "customer_id";
    const STORE_ID = 'store_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    const DETAIL = 'detail';

    public function getFormId();

    public function setFormId($id);

    public function getFormatId();

    public function setFormatId($formatId);

    public function getCustomerId();

    public function setCustomerId($customerId);

    public function getStoreId();

    public function setStoreId($storeId);

    public function getCreatedAt();

    public function setCreatedAt($date);

    public function getUpdatedAt();

    public function setUpdatedAt($date);

    public function getDetail();

    public function setDetail($detail);

}
