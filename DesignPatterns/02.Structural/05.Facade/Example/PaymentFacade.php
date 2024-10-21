<?php

/**
 * The Facade Class
 *
 * This class simplifies interaction with the subsystems by providing a unified method to handle payments.
 */
class PaymentFacade
{
    private PaymentValidator $paymentValidator;
    private FraudChecker $fraudChecker;
    private PaymentGateway $paymentGateway;
    private TransactionLogger $transactionLogger;

    public function __construct()
    {
        // of course all these can be injected via DI container or fetched from a service locator or factory
        $this->paymentValidator = new PaymentValidator();
        $this->fraudChecker = new FraudChecker();
        $this->paymentGateway = new PaymentGateway();
        $this->transactionLogger = new TransactionLogger();
    }


    public function processPayment(
        array $paymentDetails
    )
    {
        // Use subsystems via facade
        if ($this->paymentValidator->validate($paymentDetails)) {
            if ($this->fraudChecker->check($paymentDetails)) {
                if ($this->paymentGateway->process($paymentDetails)) {
                    $this->transactionLogger->log($paymentDetails);
                    echo "Payment processed successfully!\n";
                }
            }
        }
    }
}
