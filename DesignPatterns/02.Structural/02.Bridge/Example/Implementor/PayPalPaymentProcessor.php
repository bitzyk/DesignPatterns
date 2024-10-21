<?php

/**
 * ConcreteImplementor: Visa PayPal Processor
 */
class PayPalPaymentProcessor implements PaymentProcessorInterface
{
    public function processPayment(float $amount): void
    {
        echo sprintf(
            "Paying via PayPal: %s\n",
            $amount
        );
    }
}
