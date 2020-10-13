<?php

namespace Oye\Deliverydate\Model\Observer\Adminhtml;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class SaveDeliveryDateToQuote
 * @package Oye\Deliverydate\Model\Observer\Adminhtml
 */
class SaveDeliveryDateToQuote implements ObserverInterface
{


    /**
     * @param EventObserver $observer
     */
    public function execute(EventObserver $observer)
    {
        $deliveryDate = $observer->getRequestModel()->getParam('delivery_date');
        $orderBy = $observer->getRequestModel()->getParam('order_by');
        if($deliveryDate)
        {
            $quote = $observer->getOrderCreateModel()->getQuote();
            $quote->setDeliveryDate($deliveryDate);
            $quote->setOrderBy($orderBy);
        }
    }

}