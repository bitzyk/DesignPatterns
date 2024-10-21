<?php

/**
 * Abstraction: Payment Type
 */
abstract class AbstractPaymentType
{
    public function __construct(
        protected readonly PaymentProcessorInterface $paymentProcessor
    )
    {

    }

    abstract public function makePayment(float $amount): void;
}
