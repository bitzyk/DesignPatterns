<?php

/**
 * Loyalty discount handler
 *
 * This handler will apply a discount for
 * It will also call the next handler in the chain
 *
 * So, we sum up all discounts
 * We could also apply only the first found discount -> in that case we would not call handleNext
 */
class LoyaltyDiscountHandler extends AbstractDiscountHandler implements DiscountHandlerInterface
{
    protected const float DISCOUNT = 0.05; // 5% for loyal customers

    public function handleDiscount(Order $order): void
    {
        // apply discount if is loyal customer
        if ($order->isLoyalCustomer()) {
            $this->applyDiscount($order);
        }

        // handle next discount
        // we sum up all discounts
        // we could also apply only the first found discount -> in that case we would not call handleNext
        $this->handleNext($order);
    }

    protected function getDiscountName(): string
    {
        return 'Loyalty discount 5%';
    }

    protected function getDiscountType(): string
    {
        return 'Loyalty';
    }
}
