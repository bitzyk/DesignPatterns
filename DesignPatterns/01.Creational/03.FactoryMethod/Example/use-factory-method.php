<?php

require_once __DIR__ . '/Entity/MessageInterface.php';
require_once __DIR__ . '/Entity/CsvMessage.php';
require_once __DIR__ . '/Entity/JsonMessage.php';
require_once __DIR__ . '/AbstractMessageFactory.php';
require_once __DIR__ . '/CsvMessageFactory.php';
require_once __DIR__ . '/JsonMessageFactory.php';


$messageData = [
    'name' => 'John Doe',
    'email' => 'john.doe@gmail.com',
    'phone' => '1234567890',
];

class Client {
    public function __construct(
        private AbstractMessageFactory $messageFactory,
    )
    {

    }

    public function printMessage(
        array $messageData
    )
    {
        $message = $this->messageFactory->createMessage();
        $message->printMessage($messageData);
    }

}

$messageFactory = new CsvMessageFactory();

// here we can change the factory to JsonMessageFactory
// and with this change we can change the message format
//$messageFactory = new JsonMessageFactory();

$client = new StaticProxy\Client($messageFactory);
$client->printMessage($messageData);
