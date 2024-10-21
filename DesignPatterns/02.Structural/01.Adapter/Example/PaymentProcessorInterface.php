<?php

/**
 * This is the existing interface that our application expects for any payment service.
 */
interface PaymentProcessorInterface
{
    public function processPayment(float $amount): void;
}
