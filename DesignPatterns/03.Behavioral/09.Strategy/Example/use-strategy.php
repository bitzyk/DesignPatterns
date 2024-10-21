<?php

require_once __DIR__ . '/TransportStrategyInterface.php';
require_once __DIR__ . '/Transport.php';

require_once __DIR__ . '/Entity/Message.php';

require_once __DIR__ . '/Strategy/HttpsTransportStrategy.php';
require_once __DIR__ . '/Strategy/HttpTransportStrategy.php';
require_once __DIR__ . '/Strategy/SftpTransportStrategy.php';


$transport = new Transport(
    new HttpsTransportStrategy()
);

$message = new Message('Hello, World!');

$transport->send($message);
