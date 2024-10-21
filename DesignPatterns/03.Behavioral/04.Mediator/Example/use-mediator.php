<?php

require_once __DIR__ . '/EventEnum.php';
require_once __DIR__ . '/MediatorInterface.php';
require_once __DIR__ . '/AbstractColleague.php';
require_once __DIR__ . '/WarehouseMediator.php';
require_once __DIR__ . '/Colleague/Order.php';
require_once __DIR__ . '/Colleague/Inventory.php';
require_once __DIR__ . '/Colleague/Shipment.php';
require_once __DIR__ . '/Colleague/Notification.php';


$order = new Order();

// mediator will handle all the complexity of communication between the objects
$warehouseMediator = new WarehouseMediator(
    new Inventory(),
    new Shipment(),
    $order,
    new Notification()
);

$order->createOrder(
    '1234',
    2,
    'Bucharest, 81.'
);


