<?php

interface ShipmentInterface
{
    public function accept(ShipmentVisitorInterface $visitor): void;

    public function getBaseCost(): float;

    public function setFinalCost(float $cost): void;

    public function getFinalCost(): float;
}
