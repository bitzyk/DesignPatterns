<?php

class ShipmentAuditVisitor implements ShipmentVisitorInterface
{
    public function visitStandardShipment(StandardShipment $shipment): mixed
    {
        if ($shipment->isPackagingIntact()) {
            return true;
        }

        return false;
    }

    public function visitExpressShipment(ExpressShipment $shipment): mixed
    {
        if ($shipment->isOnTime()) {
            return true;
        }

        return false;
    }

    public function visitInternationalShipment(InternationalShipment $shipment): mixed
    {
        if ($shipment->hasValidCustomsDocs()) {
            return true;
        }

        return false;
    }


}
