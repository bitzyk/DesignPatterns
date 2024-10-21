<?php

class CarInsurance implements InsuranceInterface
{
    public function calculateCost(): float
    {
        return 12.5;
    }

}
