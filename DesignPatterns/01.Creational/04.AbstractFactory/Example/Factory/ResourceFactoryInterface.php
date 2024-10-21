<?php

interface ResourceFactoryInterface
{
    public function createInstance(int $capacity): CloudInstanceInterface;

    public function createStorage(int $spaceMb): CloudStorageInterface;
}
