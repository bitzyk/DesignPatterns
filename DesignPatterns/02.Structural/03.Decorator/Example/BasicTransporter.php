<?php

/**
 * BasicTransporter Class
 *
 * Implements the ApiTransportInterface and provides the basic transport functionality.
 * It is the base class that will/may be decorated by the AuthDecorator and RateLimiterDecorator.
 */
class BasicTransporter implements ApiTransportInterface
{
    public function transport(TransportMessage $transportMessage): void
    {
        echo sprintf(
            "Transporting message: %s \n",
            $transportMessage->getMessage()
        );
    }

}
