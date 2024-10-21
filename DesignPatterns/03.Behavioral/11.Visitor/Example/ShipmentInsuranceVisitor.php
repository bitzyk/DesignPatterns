<?php

class ShipmentInsuranceVisitor implements ShipmentVisitorInterface
{
    public function visitStandardShipment(StandardShipment $shipment): null
    {
        $shipment->setFinalCost(
            $shipment->getBaseCost() * 1.1 // 10% extra for insurance
        );

        return null;
    }

    public function visitExpressShipment(ExpressShipment $shipment): null
    {
        $shipment->setFinalCost(
            $shipment->getBaseCost() * 1.2 // 20% extra for insurance
        );

        return null;
    }

    public function visitInternationalShipment(InternationalShipment $shipment): null
    {
        $shipment->setFinalCost(
            $shipment->getBaseCost() * 1.3 // 30% extra for insurance
        );

        return null;
    }

}
