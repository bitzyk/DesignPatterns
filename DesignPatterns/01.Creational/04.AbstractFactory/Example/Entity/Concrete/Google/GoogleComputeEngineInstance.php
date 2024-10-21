<?php

class GoogleComputeEngineInstance extends AbstractCloudInstance implements CloudInstanceInterface
{
    public function start(): void
    {
        echo sprintf(
            'Starting Google Compute Engine instance' . PHP_EOL,
        );
    }

    public function stop(): void
    {
        echo sprintf(
            'Stopping Google Compute Engine instance' . PHP_EOL,
        );
    }

    public function attachStorage(CloudStorageInterface $storage): void
    {
        echo sprintf(
            'Attaching Persistent Disk %s to Google Compute Engine instance' . PHP_EOL,
            $storage->getId(),
        );
    }
}
