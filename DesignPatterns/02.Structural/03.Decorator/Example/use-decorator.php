<?php

require_once __DIR__ . '/Entity/TransportMessage.php';
require_once __DIR__ . '/ApiTransportInterface.php';
require_once __DIR__ . '/BasicTransporter.php';
require_once __DIR__ . '/RateLimiterDecorator.php';
require_once __DIR__ . '/AuthDecorator.php';

class Client
{
    public function __construct(
        private ApiTransportInterface $apiTransport,
    )
    {

    }

    public function makeTransport(TransportMessage $transportMessage): void
    {
        $this->apiTransport->transport($transportMessage);
    }
}

$client = new StaticProxy\Client(
    // we create the transport by wrapping it with the decorators
    new AuthDecorator(
        new RateLimiterDecorator(
            new BasicTransporter(),
            100, // 100 req
            60 // in 60 seconds
        )
    )
);

$transportMessage = new TransportMessage(
    'Hello world',
    [
        'authToken' => '123456'
    ]
);

$client->makeTransport($transportMessage);
