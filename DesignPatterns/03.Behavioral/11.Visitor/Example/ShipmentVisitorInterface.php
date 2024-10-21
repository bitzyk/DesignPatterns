<?php

interface ShipmentVisitorInterface
{
    public function visitStandardShipment(StandardShipment $shipment): mixed;
    public function visitExpressShipment(ExpressShipment $shipment): mixed;
    public function visitInternationalShipment(InternationalShipment $shipment): mixed;
}
