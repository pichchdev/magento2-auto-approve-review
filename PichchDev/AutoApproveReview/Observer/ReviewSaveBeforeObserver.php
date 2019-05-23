<?php

namespace PichchDev\AutoApproveReview\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Review\Model\Review;
use Psr\Log\LoggerInterface;

class ReviewSaveBeforeObserver implements ObserverInterface
{
    /** @var \Magento\Framework\Logger\Monolog */
    protected $logger;

    public function __construct(
        LoggerInterface $loggerInterface
    )
    {
        $this->logger = $loggerInterface;
    }

    /**
     * This is the method that fires when the event runs.
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $this->logger->addDebug('Executed Review Save After Observer');

        /** @var Review $review */
        $review = $observer->getDataByKey('object');
        
        //set default status = APPROVED 
        $review->setStatusId(Review::STATUS_APPROVED);
    }
}