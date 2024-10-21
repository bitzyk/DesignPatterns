<?php

require_once __DIR__ . '/Director.php';
require_once __DIR__ . '/BuilderInterface.php';

require_once __DIR__ . '/Entity/OrderEntity.php';
require_once __DIR__ . '/Entity/AddressEntity.php';
require_once __DIR__ . '/Entity/CustomerEntity.php';
require_once __DIR__ . '/Entity/OrderLine.php';
require_once __DIR__ . '/Entity/Product.php';

require_once __DIR__ . '/ConcreteBuilder/Web/OrderBuilder.php';
require_once __DIR__ . '/ConcreteBuilder/Web/AddressBuilder.php';
require_once __DIR__ . '/ConcreteBuilder/Web/CustomerBuilder.php';
require_once __DIR__ . '/ConcreteBuilder/Web/OrderLineBuilder.php';
require_once __DIR__ . '/ConcreteBuilder/Web/ProductBuilder.php';

require_once __DIR__ . '/ConcreteBuilder/Rest/AddressRestBuilder.php';

$orderInputData = [
    'order_price' => 150,
    'client' => [
        'name' => 'John Doe',
        'email' => 'john.doe@gmail.com',
    ],
    'products' => [
        [
            'id' => 1,
            'qty' => 100,
            'line_price' => 100,
        ],
        [
            'id' => 2,
            'qty' => 50,
            'line_price' => 50,
        ],
    ],
    'shipToAddress' => [
        'street' => '123 Main St',
        'city' => 'Springfield',
        'state' => 'IL',
        'zip' => '62701',
    ],
];


$director = new Director(
    new OrderBuilder(),
    new AddressBuilder(), // you can change the builder at runtime by passing a different builder i.e. AddressRestBuilder
    new CustomerBuilder(),
    new ProductBuilder(),
    new OrderLineBuilder(),
);

$order = $director->createOrder($orderInputData);

assert($order instanceof OrderEntity);
