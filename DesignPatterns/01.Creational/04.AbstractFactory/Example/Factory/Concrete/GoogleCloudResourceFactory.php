<?php

class GoogleCloudResourceFactory implements ResourceFactoryInterface
{
    public function createInstance(int $capacity): CloudInstanceInterface
    {
        return new GoogleComputeEngineInstance(
            $capacity
        );
    }

    public function createStorage(int $spaceMb): CloudStorageInterface
    {
        return new GoogleCloudStorage(
            $spaceMb
        );
    }


}
