<?php

/**
 * Standard discount handler
 *
 * This handler will apply a discount for first time buyers
 * It will also call the next handler in the chain
 *
 * So, we sum up all discounts
 * We could also apply only the first found discount -> in that case we would not call handleNext
 */
class StandardDiscountHandler extends AbstractDiscountHandler implements DiscountHandlerInterface
{
    protected const float DISCOUNT = 0.1; // 10% for first time buyers

    public function handleDiscount(Order $order): void
    {
        if ($order->isFirstTimeBuyer()) {
            $this->applyDiscount($order);
        }

        // handle next discount
        // we sum up all discounts
        // we could also apply only the first found discount -> in that case we would not call handleNext
        $this->handleNext($order);
    }

    protected function getDiscountName(): string
    {
        return 'Standard discount 10%';
    }

    protected function getDiscountType(): string
    {
        return 'Standard';
    }


}
