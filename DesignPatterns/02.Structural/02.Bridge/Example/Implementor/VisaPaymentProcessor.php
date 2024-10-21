<?php

/**
 * ConcreteImplementor: Visa Payment Processor
 */
class VisaPaymentProcessor implements PaymentProcessorInterface
{
    public function processPayment(float $amount): void
    {
        echo sprintf(
            "Paying via Visa: %s\n",
            $amount
        );
    }
}
