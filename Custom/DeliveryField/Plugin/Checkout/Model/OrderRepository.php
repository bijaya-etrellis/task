<?php
namespace Custom\DeliveryField\Plugin\Checkout\Model;

class OrderRepository
{
    protected $quoteRepository;

    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository
    ) {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param Magento\Sales\Api\Data\OrderInterface $order
     */
    public function afterget(
        \Magento\Sales\Model\OrderRepository $subject,
        $order
    ) {
        $extensionAttributes = $order->getExtensionAttributes();
        $extensionAttributes->setDeliveryDate("10.09.2022"); // custom field value
        $order->setExtensionAttributes($extensionAttributes);
        return $order;
    }
}
