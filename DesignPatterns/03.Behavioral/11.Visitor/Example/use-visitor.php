<?php

require_once __DIR__ . '/ShipmentVisitorInterface.php';
require_once __DIR__ . '/ShipmentAuditVisitor.php';
require_once __DIR__ . '/ShipmentInsuranceVisitor.php';

require_once __DIR__ . '/Shipment/ShipmentInterface.php';

require_once __DIR__ . '/Shipment/Concrete/ExpressShipment.php';
require_once __DIR__ . '/Shipment/Concrete/InternationalShipment.php';
require_once __DIR__ . '/Shipment/Concrete/StandardShipment.php';


$auditVisitor = new ShipmentAuditVisitor();

$standardShipment = new StandardShipment(packagingIntact: true);
$expressShipment = new ExpressShipment(onTime: true);
$internationalShipment = new InternationalShipment(validCustomsDocs: true);

assert(
    true === $auditVisitor->visitExpressShipment($expressShipment),
);

assert(
    false === $auditVisitor->visitExpressShipment(new ExpressShipment(onTime: false)),
);


assert(
    true === $auditVisitor->visitStandardShipment($standardShipment),
);

assert(
    true === $auditVisitor->visitInternationalShipment($internationalShipment),
);

// here we can crate a new visitor that calculates the insurance cost

$shipmentInsuranceVisitor = new ShipmentInsuranceVisitor();

$shipmentInsuranceVisitor->visitStandardShipment($standardShipment);

assert(
    11 == $standardShipment->getFinalCost()
);

$shipmentInsuranceVisitor->visitExpressShipment($expressShipment);

assert(
    24 == $expressShipment->getFinalCost()
);


$shipmentInsuranceVisitor->visitInternationalShipment($internationalShipment);

assert(
    65 == $internationalShipment->getFinalCost()
);

