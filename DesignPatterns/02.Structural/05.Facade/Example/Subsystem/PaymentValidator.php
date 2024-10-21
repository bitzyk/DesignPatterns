<?php

/**
 * Validation subsystem
 */
class PaymentValidator
{

    public function validate(array $paymentDetails): bool
    {
        echo sprintf(
            "Validating payment details.\n",
        );

        return true;
    }
}
