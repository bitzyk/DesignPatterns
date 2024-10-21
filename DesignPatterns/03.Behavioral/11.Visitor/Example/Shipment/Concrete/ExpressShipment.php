<?php

class ExpressShipment implements ShipmentInterface {

    private float|null $finalCost = null;

    public function __construct(
        private readonly bool $onTime
    ) {
    }

    public function isOnTime(): bool {
        return $this->onTime;
    }

    public function accept(ShipmentVisitorInterface $visitor): void {
        $visitor->visitExpressShipment($this);
    }

    public function getBaseCost(): float
    {
        return 20;
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
