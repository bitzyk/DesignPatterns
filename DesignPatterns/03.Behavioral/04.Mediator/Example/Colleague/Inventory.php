<?php


class Inventory extends AbstractColleague
{
    public function reduceStock(
        string $sku,
        int $quantity,
    )
    {
        echo sprintf(
            "Decreased %d items with SKU %s from stock.\n",
            $quantity,
            $sku,
        ); // simulate decreasing stock

        // notify the mediator that the stock has been decreased
        $this->mediator->notify(
            $this,
            EventEnum::STOCK_DECREASED,
            [
                'sku' => $sku,
                'quantity' => $quantity,
            ]
        );
    }
}
