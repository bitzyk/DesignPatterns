<?php

class Ec2Instance extends AbstractCloudInstance implements CloudInstanceInterface
{
    public function start(): void
    {
        echo sprintf(
            'Starting EC2 instance' . PHP_EOL,
        );
    }

    public function stop(): void
    {
        echo sprintf(
            'Stopping EC2 instance' . PHP_EOL,
        );
    }

    public function attachStorage(CloudStorageInterface $storage): void
    {
        echo sprintf(
            'Attaching EBS volume %s to EC2 instance' . PHP_EOL,
            $storage->getId(),
        );
    }
}
