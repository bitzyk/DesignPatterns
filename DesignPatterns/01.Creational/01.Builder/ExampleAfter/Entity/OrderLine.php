<?php

class OrderLine
{
    public function __construct(
        private Product $product,
        private int $quantity,
        private float $price
    )
    {
    }
}
