<?php

class Order extends AbstractColleague
{
    private bool $shipped = false;

    public function createOrder(
        string $sku,
        int $quantity,
        string $address
    )
    {
        echo sprintf(
            "Created order with %d items of SKU %s and address %s.\n",
            $quantity,
            $sku,
            $address,
        ); // simulate creating order

        // notify the mediator that the order has been created
        $this->mediator->notify(
            $this,
            EventEnum::ORDER_CREATED,
            [
                'sku' => $sku,
                'quantity' => $quantity,
                'address' => $address
            ]
        );
    }

    public function markAsShipped(bool $shipped): void
    {
        $this->shipped = $shipped;
        // no notification here, as the shipment creation will notify the warehouse team
    }

}
