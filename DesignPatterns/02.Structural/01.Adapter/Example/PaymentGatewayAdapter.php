<?php

/**
 * The adapter that makes ThirdPartyPaymentGateway compatible with PaymentProcessor
 */
class PaymentGatewayAdapter implements PaymentProcessorInterface
{
    public function __construct(
        private readonly ThirdPartyPaymentGateway $thirdPartyPaymentGateway
    )
    {
    }

    public function processPayment(float $amount): void
    {
        // adapt the interface to what our application expects
        $this->thirdPartyPaymentGateway->sendPayment(
            (string) $amount
        );
    }


}
