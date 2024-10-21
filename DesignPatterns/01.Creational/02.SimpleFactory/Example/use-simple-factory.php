<?php

require_once __DIR__ . '/Entity/InsuranceInterface.php';
require_once __DIR__ . '/Entity/CarInsurance.php';
require_once __DIR__ . '/Entity/HouseInsurance.php';
require_once __DIR__ . '/InsuranceFactory.php';

$carInsurance = InsuranceFactory::createInsurance('car');
$houseInsurance = InsuranceFactory::createInsurance('house');

assert($carInsurance instanceof CarInsurance);
assert($houseInsurance instanceof HouseInsurance);
