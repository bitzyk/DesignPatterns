<?php

interface CloudInstanceInterface
{
    public function start() : void;

    public function stop(): void;

    public function attachStorage(CloudStorageInterface $storage): void;
}
