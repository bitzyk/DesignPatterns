<?php

class StandardShipment implements ShipmentInterface
{

    private float|null $finalCost = null;

    public function __construct(
        private readonly bool $packagingIntact
    ) {
    }

    public function isPackagingIntact(): bool {
        return $this->packagingIntact;
    }

    public function accept(ShipmentVisitorInterface $visitor): void {
        $visitor->visitStandardShipment($this);
    }

    public function getBaseCost(): float
    {
        return 10;
    }

    public function setFinalCost(float $cost): void
    {
        $this->finalCost = $cost;
    }

    public function getFinalCost(): float
    {
        return (float) $this->finalCost;
    }


}
