<?php

namespace Venice\Form\Api\Data;
use Magento\Framework\Api\ExtensibleDataInterface;


interface FormFormatInterface extends ExtensibleDataInterface
{

    const FORMAT_ID = 'format_id';
    const NAME = 'name';
    const EMAIL = 'email';
    const STATUS = 'status';
    const STORE_ID = 'store_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    const DETAIL = 'detail';


    public function getFormatId();

    public function setFormatId($id);

    public function getName();

    public function setName($name);

    public function getEmail();

    public function setEmail($email);

    public function getStatus();

    public function setStatus($status);

    public function getStoreId();

    public function setStoreId($storeId);

    public function getCreatedAt();

    public function setCreatedAt($date);

    public function getUpdatedAt();

    public function setUpdatedAt($date);

    public function getDetail();

    public function setDetail($detail);

}

