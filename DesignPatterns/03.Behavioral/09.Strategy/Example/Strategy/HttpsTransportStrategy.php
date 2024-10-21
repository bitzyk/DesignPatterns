<?php

class HttpsTransportStrategy implements TransportStrategyInterface
{
    public function transport(Message $message): void
    {
        echo sprintf(
            'Sending message "%s" via HTTPS transport' . PHP_EOL,
            $message->getContent()
        );
    }

}
