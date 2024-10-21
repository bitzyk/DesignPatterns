<?php

/**
 * Refined Abstraction: Subscription Payment
 */
class SubscriptionPayment extends AbstractPaymentType
{
    public function makePayment(float $amount): void
    {
        $this->logicForSubscriptionPayment(); // simulate some logic

        $this->paymentProcessor->processPayment($amount);
    }

    private function logicForSubscriptionPayment()
    {
        echo sprintf("Logic for subscription payment \n",);
    }

}
