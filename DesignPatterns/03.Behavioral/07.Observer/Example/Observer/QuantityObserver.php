<?php

class QuantityObserver extends AbstractObserver implements ObserverInterface
{
    /**
     * @param Order $subject
     */
    protected function doUpdate(ObservableInterface $subject): void
    {
        echo sprintf(
            "Quantity has been changed to %d\n",
            $subject->getQty()
        );
    }

    protected function getExpectedAction(): string
    {
        return 'quantity-changed';
    }

    protected function getExpectedSubject(): string
    {
        return Order::class;
    }

}
