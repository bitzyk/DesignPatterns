<?php

/*
 * Fraud subsystem
 */
class FraudChecker
{

    public function check(array $paymentDetails): bool
    {
        echo sprintf(
            "Checking for fraud.\n",
        );

        return true;
    }
}
