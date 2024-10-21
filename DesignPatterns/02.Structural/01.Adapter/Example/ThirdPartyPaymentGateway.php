<?php

/**
 * This class comes from a third-party library, and you can’t modify it.
 *
 * This is the class that doesn't match our required interface (PaymentProcessorInterface).
 */
class ThirdPartyPaymentGateway
{
    public function sendPayment(string $amount) {
        echo sprintf(
            'Simulating a payment of %s using ThirdPartyPaymentGateway.' . PHP_EOL,
            $amount
        );
    }
}
