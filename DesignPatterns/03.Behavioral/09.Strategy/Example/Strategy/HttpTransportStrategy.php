<?php

class HttpTransportStrategy implements TransportStrategyInterface
{
    public function transport(Message $message): void
    {
        echo sprintf(
            'Sending message "%s" via HTTP transport' . PHP_EOL,
            $message->getContent()
        );
    }

}
