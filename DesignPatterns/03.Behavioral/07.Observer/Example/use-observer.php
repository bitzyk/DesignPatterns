<?php

require_once __DIR__ . '/ObservableInterface.php';
require_once __DIR__ . '/ObserverInterface.php';
require_once __DIR__ . '/AbstractObservable.php';
require_once __DIR__ . '/AbstractObserver.php';


require_once __DIR__ . '/Observer/InventoryObserver.php';
require_once __DIR__ . '/Observer/PriceObserver.php';
require_once __DIR__ . '/Observer/QuantityObserver.php';


require_once __DIR__ . '/Order.php';

// initialize the subject
$order = new Order();

// initialize & attach the observers

$order
    ->attach(new InventoryObserver())
    ->attach(new PriceObserver())
    ->attach(new QuantityObserver());
;

$order->changePrice(12);

$order->changeQuantity(2);
$order->changeQuantity(4);

$order->shipOrder();

