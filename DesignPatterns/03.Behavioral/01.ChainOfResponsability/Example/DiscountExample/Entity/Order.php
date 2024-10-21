<?php

class Order
{

    private float $discount = 0;

    private array $discounts = [];

    public function __construct(
        private readonly float $totalAmount,
        private readonly bool $isFirstTimeBuyer,
        private readonly bool $isLoyalCustomer,
        private readonly int $orderMonth,
    )
    {

    }

    public function isFirstTimeBuyer(): bool
    {
        return $this->isFirstTimeBuyer;
    }

    public function addDiscount(
        float $discountValue,
        string $discountName,
        string $discountType,
    )
    {
        $this->discount += $discountValue;

        $this->discounts[] = [
            'discountValue' => $discountValue,
            'discountName' => $discountName,
            'discountType' => $discountType,
        ];
    }

    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    public function getOrderMonth(): int
    {
        return $this->orderMonth;
    }

    public function isLoyalCustomer(): bool
    {
        return $this->isLoyalCustomer;
    }

    public function getPriceToPay(): float
    {
        return $this->totalAmount - $this->discount;
    }

    public function getDiscounts(): array
    {
        return $this->discounts;
    }
}
