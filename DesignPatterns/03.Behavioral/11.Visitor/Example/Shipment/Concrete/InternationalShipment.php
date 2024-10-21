<?php

class InternationalShipment implements ShipmentInterface {

    private float|null $finalCost = null;

    public function __construct(
        private readonly bool $validCustomsDocs
    ) {
    }

    public function hasValidCustomsDocs(): bool {
        return $this->validCustomsDocs;
    }

    public function accept(ShipmentVisitorInterface $visitor): void {
        $visitor->visitInternationalShipment($this);
    }

    public function getBaseCost(): float
    {
        return 50;
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
