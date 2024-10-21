<?php

require_once __DIR__ . '/Subsystem/FraudChecker.php';
require_once __DIR__ . '/Subsystem/PaymentGateway.php';
require_once __DIR__ . '/Subsystem/PaymentValidator.php';
require_once __DIR__ . '/Subsystem/TransactionLogger.php';
require_once __DIR__ . '/PaymentFacade.php';


class Client
{

    /**
     * Here we demonstrate how the client code may look like with a facade
     *
     * The complexity is hidden allowing the client to interact with the facade instead of the subsystems directly.
     */
    public function processPaymentAfterFacade(
        array $paymentDetails
    )
    {
        $paymentFacade = new PaymentFacade(); // of course this will be injected in real life
        $paymentFacade->processPayment($paymentDetails);
    }

    /**
     * Here we demonstrate how the code may look like without a facade
     *
     * Explanation:
     * Multiple Interactions: The client must instantiate and interact with each subsystem (validator, fraud checker, gateway, logger) individually.
     * Tight Coupling: The client is tightly coupled to the internal workings of the payment process, making the code more fragile and harder to modify if any subsystem changes.
     * Complex Logic: The business logic is scattered across the client code, making it more complex and harder to maintain.
     * If you need to change the payment processing logic or add more steps, you would need to update the client code in multiple places.
     */
    public function processPaymentBeforeFacade(
        array $paymentDetails
    )
    {
        $paymentValidator = new PaymentValidator();
        $fraudChecker = new FraudChecker();
        $paymentGateway = new PaymentGateway();
        $transactionLogger = new TransactionLogger();

        // Use subsystems directly
        if ($paymentValidator->validate($paymentDetails)) {
            if ($fraudChecker->check($paymentDetails)) {
                if ($paymentGateway->process($paymentDetails)) {
                    $transactionLogger->log($paymentDetails);
                    echo "Payment processed successfully!\n";
                }
            }
        }
    }


}

$client = new StaticProxy\Client();

$paymentDetails = [
    'amount' => 100.00,
    'currency' => 'USD',
    'method' => 'credit_card',
    'card_number' => '1234-5678-9876-5432',
];


$client->processPaymentAfterFacade($paymentDetails);
$client->processPaymentBeforeFacade($paymentDetails);
