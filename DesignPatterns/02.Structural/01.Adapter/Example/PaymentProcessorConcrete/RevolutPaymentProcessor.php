<?php

/**
 * This is an existing concrete payment processor that implements our expected interface.
 */
class RevolutPaymentProcessor implements PaymentProcessorInterface
{
    public function processPayment(float $amount): void
    {
        echo sprintf(
            'Simulating a payment of %s using Revolut.' . PHP_EOL,
            $amount
        );
    }


}
