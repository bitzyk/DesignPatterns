<?php

class PriceObserver extends AbstractObserver implements ObserverInterface
{
    /**
     * @param Order $subject
     */
    protected function doUpdate(ObservableInterface $subject): void
    {
        echo sprintf(
            "Price observer notified: Price changed to %s\n",
            $subject->getPrice()
        );
    }

    protected function getExpectedAction(): string
    {
        return 'price-changed';
    }

    protected function getExpectedSubject(): string
    {
        return Order::class;
    }

}

