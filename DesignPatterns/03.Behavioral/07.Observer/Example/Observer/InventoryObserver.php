<?php

class InventoryObserver extends AbstractObserver implements ObserverInterface
{
    /**
     * @param Order $subject
     */
    protected function doUpdate(ObservableInterface $subject): void
    {
        echo sprintf(
            "We need to decrease the following product quantity: %s\n",
            $subject->getQty()
        );
    }

    protected function getExpectedAction(): string
    {
        return 'order-shipped';
    }

    protected function getExpectedSubject(): string
    {
        return Order::class;
    }

}
