<?php

require_once __DIR__ . '/PaymentProcessorInterface.php';
require_once __DIR__ . '/PaymentGatewayAdapter.php';
require_once __DIR__ . '/ThirdPartyPaymentGateway.php';
require_once __DIR__ . '/PaymentProcessorConcrete/RevolutPaymentProcessor.php';

class Client {

    public function __construct(
        // PaymentProcessor: Our application's expected interface for processing payments.
        private readonly PaymentProcessorInterface $paymentProcessor,
    )
    {

    }

    public function buyProduct(int $productId)
    {
        $this->paymentProcessor->processPayment(
            $this->getPriceForProduct($productId)
        );
    }

    private function getPriceForProduct(int $productId): float
    {
        $mapProductPrices = [
            1 => 12.12,
            2 => 24.22,
            3 => 36.33,
        ];

        return $mapProductPrices[$productId];
    }
}

$paymentProcessor = new RevolutPaymentProcessor();

// PaymentGatewayAdapter: The adapter that translates the sendPayment() method from the third-party class into the processPayment() method required by our application.
$paymentProcessor = new PaymentGatewayAdapter(new ThirdPartyPaymentGateway());


$client = new StaticProxy\Client(
    $paymentProcessor
);

$client->buyProduct(2);
$client->buyProduct(1);



