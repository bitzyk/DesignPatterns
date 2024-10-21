<?php

interface TransportStrategyInterface
{
    public function transport(Message $message): void;
}
