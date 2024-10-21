<?php

class Transport
{
    public function __construct(
        private readonly TransportStrategyInterface $strategy,
    ) {

    }


    public function send(Message $message): void
    {
        $this->strategy->transport($message);
    }

}
