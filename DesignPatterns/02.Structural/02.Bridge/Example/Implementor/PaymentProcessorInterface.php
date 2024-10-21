<?php

/**
 * Implementor: Payment Processor
 */
interface PaymentProcessorInterface
{
    public function processPayment(float $amount): void;
}
