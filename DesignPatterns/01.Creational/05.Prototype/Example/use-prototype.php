<?php

require_once __DIR__ . '/Entity/PrototypeInterface.php';
require_once __DIR__ . '/Entity/Request.php';
require_once __DIR__ . '/HttpClientMock.php';


class Client {

    public function __construct(
        private readonly HttpClientMock $httpClientMock,
    )
    {

    }

    public function sendRequest(
        int $howMany,
    )
    {
        $request = new Request(
            'POST',
            'http://example.com',
            [
                'requestId' => $requestId = 1,
            ],
            [
                'Content-Type' => 'text/plain',
            ]
        ); // this will also invoke costlyOperation() from the constructor

        $this->httpClientMock->sendRequest($request);

        for ($i = 0; $i < $howMany; $i++) {
            // this will bypass the costlyOperation() from the constructor because of __clone() method
            $requestClone = clone $request;

            // we need to change only the requestId to the cloned object
            $requestClone->setRequestId($requestId + $i);

            $this->httpClientMock->sendRequest($requestClone);
        }
    }
}

$client = new StaticProxy\Client(
    new HttpClientMock()
);

$client->sendRequest(100);

