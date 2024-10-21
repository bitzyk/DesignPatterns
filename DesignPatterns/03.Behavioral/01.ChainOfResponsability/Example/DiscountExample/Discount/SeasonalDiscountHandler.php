<?php

/**
 * Seasonal discount handler
 *
 * This handler will apply a discount for
 * It will also call the next handler in the chain
 *
 * So, we sum up all discounts
 * We could also apply only the first found discount -> in that case we would not call handleNext
 */
class SeasonalDiscountHandler extends AbstractDiscountHandler implements DiscountHandlerInterface
{

    protected const float DISCOUNT = 0.2; // 20% for first time buyers

    public function handleDiscount(Order $order): void
    {
        // apply discount if in december (Christmas month)
        if ($order->getOrderMonth() == 12) {
            $this->applyDiscount($order);
        }

        // handle next discount
        // we sum up all discounts
        // we could also apply only the first found discount -> in that case we would not call handleNext
        $this->handleNext($order);
    }

    protected function getDiscountName(): string
    {
        return 'Seasonal discount 20%';
    }

    protected function getDiscountType(): string
    {
        return 'Seasonal';
    }
}
