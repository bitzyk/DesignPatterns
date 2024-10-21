<?php

/**
 * This is our subject
 * It is Observable as it can attach observers
 */
class Order extends AbstractObservable implements ObservableInterface
{

    private float $price = 0;
    private int $qty = 0;

    private bool $shipped = false;

    public function changePrice(
        int $newPrice
    )
    {
        $this->price = $newPrice;

        $this->notify('price-changed');
    }

    public function changeQuantity(
        int $newQuantity
    )
    {
        $this->qty = $newQuantity;

        $this->notify('quantity-changed');
    }

    public function shipOrder()
    {
        $this->shipped = true;

        $this->notify('order-shipped');
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQty(): int
    {
        return $this->qty;
    }


}
