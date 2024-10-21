<?php

class OrderEntity
{

    /**
     * @param CustomerEntity $customer
     * @param OrderLine[] $orderLines
     * @param float $totalAmount
     */
    public function __construct(
        private CustomerEntity $customer,
        private array $orderLines,
        private float $totalAmount
    )
    {

    }
}
