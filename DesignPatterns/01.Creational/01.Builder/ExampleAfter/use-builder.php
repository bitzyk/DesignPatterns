<?php

require_once __DIR__ . '/Entity/OrderEntity.php';
require_once __DIR__ . '/Entity/AddressEntity.php';
require_once __DIR__ . '/Entity/CustomerEntity.php';
require_once __DIR__ . '/Entity/OrderLine.php';
require_once __DIR__ . '/Entity/Product.php';

require_once __DIR__ . '/OrderBuilder.php';


$orderBuilder = new OrderBuilder();

$orderBuilder
    ->withExpressDelivery()
//    ->withGift(
//        'Happy Birthday!'
//    ) // we can construct only part of the order with the builder pattern
    ->withTotalAmount(150)
    ->withCustomer(
        [
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
        ]
    )
    ->withAddress(
        [
            'street' => '123 Main St',
            'city' => 'Springfield',
            'country' => 'IL',
            'postcode' => '62701',
        ]
    )
    ->withOrderLines(
        [
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
        ]
    )
;

$order = $orderBuilder->build();

print_r(
    $order
);
