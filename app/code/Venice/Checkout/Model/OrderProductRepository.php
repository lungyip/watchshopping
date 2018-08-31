<?php


namespace Venice\Checkout\Model;

use Magento\Store\Model\StoreManagerInterface;
use Venice\Checkout\Api\Data\OrderProductInterface;
use Venice\Checkout\Api\OrderProductRepositoryInterface;
use Venice\Checkout\Api\Data\OrderProductInterfaceFactory;
use Venice\Checkout\Model\ResourceModel\OrderProduct as ResourceProduct;
use Magento\Framework\Exception\CouldNotSaveException;

class OrderProductRepository implements OrderProductRepositoryInterface
{

    protected $resource;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    protected $orderProductInterfaceFactory;

    public function __construct(
        ResourceProduct $resource,
        StoreManagerInterface $storeManager,
        OrderProductInterfaceFactory $orderProductInterfaceFactory
    ) {
        $this->resource                         = $resource;
        $this->storeManager                     = $storeManager;
        $this->orderProductInterfaceFactory     = $orderProductInterfaceFactory;
    }

    public function save(OrderProductInterface $orderProduct)
    {
        /** @var OrderProductInterfaceFactory|\Magento\Framework\Model\AbstractModel $orderProduct */
        try {
            $this->resource->save($orderProduct);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the order product: %1',
                $exception->getMessage()
            ));
        }

        return $orderProduct;
    }

}
