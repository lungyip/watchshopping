<?php
namespace TemplateMonster\Blog\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use TemplateMonster\Blog\Model\ResourceModel\Comment\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class MassShow
 */
class MassShow  extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    protected $cacheTypeList;


    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
    )
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->cacheTypeList = $cacheTypeList;
        parent::__construct($context);
    }
    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());

        foreach ($collection as $item) {
            $item->setStatus(true);
            $item->save();

        }
        $this->cacheTypeList->invalidate('full_page');
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been approved.', $collection->getSize()));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('TemplateMonster_Blog::comment_save');
    }
}
