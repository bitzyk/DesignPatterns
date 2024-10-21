<?php

abstract class AbstractDiscountHandler implements DiscountHandlerInterface
{
    private DiscountHandlerInterface|null $nextHandler = null;

    protected float $discountValue = 0;

    protected const float DISCOUNT = 0.1; // 10% for first time buyers

    public function setNext(DiscountHandlerInterface $handler): DiscountHandlerInterface
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    protected function handleNext(Order $order): void
    {
        if ($this->nextHandler) {
            $this->nextHandler->handleDiscount($order);
        }
    }

    protected function applyDiscount(
        Order $order,
    ): void
    {
        $this->computeDiscount($order);

        $order->addDiscount(
            $this->discountValue,
            $this->getDiscountName(),
            $this->getDiscountType(),
        );
    }


    protected function computeDiscount(
        Order $order,
    ): void
    {
        $this->discountValue = $order->getTotalAmount() * static::DISCOUNT;
    }

    protected function getDiscountValue(): float
    {
        return $this->discountValue;
    }

    abstract protected function getDiscountName(): string;
    abstract protected function getDiscountType(): string;
}
