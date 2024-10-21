<?php


class Shipment extends AbstractColleague
{
    public function createShipment(
        string $sku,
        int $quantity,
        string $address
    )
    {
        echo sprintf(
            "Created shipment with %d items of SKU %s.\n",
            $quantity,
            $sku,
        ); // simulate creating shipment

        // notify the mediator that the shipment has been created
        $this->mediator->notify(
            $this,
            EventEnum::SHIPMENT_CREATED,
            [
                'sku' => $sku,
                'quantity' => $quantity,
                'address' => $address
            ]
        );
    }
}
