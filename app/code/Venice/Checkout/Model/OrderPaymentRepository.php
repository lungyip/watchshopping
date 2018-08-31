<?php


namespace Venice\Checkout\Model;

use Magento\Store\Model\StoreManagerInterface;
use Venice\Checkout\Api\Data\OrderPaymentInterface;
use Venice\Checkout\Api\OrderPaymentRepositoryInterface;
use Venice\Checkout\Api\Data\OrderPaymentInterfaceFactory;
use Venice\Checkout\Model\ResourceModel\OrderPayment as ResourcePayment;
use Magento\Framework\Exception\CouldNotSaveException;

class OrderPaymentRepository implements OrderPaymentRepositoryInterface
{

    protected $resource;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    protected $orderPaymentInterfaceFactory;

    public function __construct(
        ResourcePayment $resource,
        StoreManagerInterface $storeManager,
        OrderPaymentInterfaceFactory $orderPaymentInterfaceFactory
    ) {
        $this->resource                         = $resource;
        $this->storeManager                     = $storeManager;
        $this->orderPaymentInterfaceFactory     = $orderPaymentInterfaceFactory;
    }

    public function save(OrderPaymentInterface $orderPayment)
    {
        /** @var OrderPaymentInterfaceFactory|\Magento\Framework\Model\AbstractModel $orderPayment */
        try {
            $this->resource->save($orderPayment);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the order payment: %1',
                $exception->getMessage()
            ));
        }

        return $orderPayment;
    }


}
