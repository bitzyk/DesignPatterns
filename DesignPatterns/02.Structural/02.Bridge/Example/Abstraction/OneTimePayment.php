<?php

/**
 * Refined Abstraction: One-time Payment
 */
class OneTimePayment extends AbstractPaymentType
{
    public function makePayment(float $amount): void
    {
        $this->logicForOneTimePayment(); // simulate some logic

        $this->paymentProcessor->processPayment($amount);
    }

    private function logicForOneTimePayment()
    {
        echo sprintf("Logic for one time payment \n",);
    }

}
