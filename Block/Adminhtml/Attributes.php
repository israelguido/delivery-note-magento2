<?php

namespace PalacioDasFerramentas\CheckoutCustomField\Block\Adminhtml;

use Magento\Framework\Exception\NoSuchEntityException;

class Attributes extends \Magento\Backend\Block\Template
{
    public $orderRepository;

    public function __construct(
        \Magento\Backend\Block\Template\Context     $context,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        array                                       $data = []
    ) {
        $this->orderRepository = $orderRepository;
        parent::__construct($context, $data);
    }

    public function getOrder()
    {
        try {
            $orderId = $this->getRequest()->getParam('order_id');
            return $this->orderRepository->get($orderId);
        } catch (NoSuchEntityException $e) {
            return false;
        }
    }
}
