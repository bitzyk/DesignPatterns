<?php

/**
 * Payment subsystem
 */
class PaymentGateway
{

    public function process(array $paymentDetails): bool
    {
        echo sprintf(
            "Processing payment.\n",
        );

        return true;
    }
}
