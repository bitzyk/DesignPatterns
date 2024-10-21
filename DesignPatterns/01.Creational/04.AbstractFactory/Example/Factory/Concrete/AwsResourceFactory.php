<?php

class AwsResourceFactory implements ResourceFactoryInterface
{
    public function createInstance(int $capacity): CloudInstanceInterface
    {
        return new Ec2Instance(
            $capacity
        );
    }

    public function createStorage(int $spaceMb): CloudStorageInterface
    {
        return new S3Storage(
            $spaceMb
        );
    }


}
