<?php

namespace Custom\Module\Controller\Index;

use \Magento\Framework\Controller\Result\RawFactory;

class Del extends \Magento\Framework\App\Action\Action
{

    /**
     * Index resultPageFactory
     * @var PageFactory
     */
    private $resultPageFactory;
    /**
     * @var
     */
    private $modelRepository;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Custom\Module\Model\ModelFactory $modelFactory
     * @param \Custom\Module\Model\ModelRepository $modelRepository
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Custom\Module\Model\ModelFactory $modelFactory,
        \Custom\Module\Model\ModelRepository $modelRepository

    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->modelFactory = $modelFactory;
        $this->modelRepository = $modelRepository;
        return parent::__construct($context);
    }

    public function execute()
    {
        $obj = $this->modelFactory->create()->load(2);
        $this->modelRepository->delete($obj);

        $this->resultFactory->create("raw");
    }
}
