<?php

require_once __DIR__ . '/Abstraction/AbstractPaymentType.php';
require_once __DIR__ . '/Abstraction/OneTimePayment.php';
require_once __DIR__ . '/Abstraction/SubscriptionPayment.php';


require_once __DIR__ . '/Implementor/PaymentProcessorInterface.php';
require_once __DIR__ . '/Implementor/PayPalPaymentProcessor.php';
require_once __DIR__ . '/Implementor/VisaPaymentProcessor.php';

class Client {

    public function __construct(
        private readonly AbstractPaymentType $paymentType
    )
    {

    }

    public function makePayment(float $amount): void
    {
        $this->paymentType->makePayment($amount);
    }
}



$paypalPaymentProcessor = new PayPalPaymentProcessor();
$visaPaymentProcessor = new VisaPaymentProcessor();

$oneTimePayment = new OneTimePayment($paypalPaymentProcessor);
$subscriptionPayment = new SubscriptionPayment($visaPaymentProcessor);

$client1 = new StaticProxy\Client($oneTimePayment);
$client1->makePayment(100);

$client2 = new StaticProxy\Client($subscriptionPayment);
$client2->makePayment(200);



