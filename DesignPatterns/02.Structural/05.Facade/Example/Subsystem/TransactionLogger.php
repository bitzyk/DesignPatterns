<?php

/**
 * Transaction logger subsystem
 */
class TransactionLogger
{
    public function log(array $paymentDetails): void
    {
        echo sprintf(
            "Logging transaction.\n",
        );
    }
}
