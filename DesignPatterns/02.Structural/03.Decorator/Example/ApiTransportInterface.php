<?php

interface ApiTransportInterface
{
    public function transport(TransportMessage $transportMessage): void;
}
