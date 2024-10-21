<?php

class SftpTransportStrategy implements TransportStrategyInterface
{
    public function transport(Message $message): void
    {
        echo sprintf(
            'Sending message "%s" via SFTP' . PHP_EOL,
            $message->getContent()
        );
    }

}
