<?php

require_once __DIR__ . '/Entity/CloudInstanceInterface.php';
require_once __DIR__ . '/Entity/CloudStorageInterface.php';
require_once __DIR__ . '/Entity/AbstractCloudInstance.php';
require_once __DIR__ . '/Entity/AbstractCloudStorage.php';

require_once __DIR__ . '/Entity/Concrete/Aws/Ec2Instance.php';
require_once __DIR__ . '/Entity/Concrete/Aws/S3Storage.php';

require_once __DIR__ . '/Entity/Concrete/Google/GoogleComputeEngineInstance.php';
require_once __DIR__ . '/Entity/Concrete/Google/GoogleCloudStorage.php';


require_once __DIR__ . '/Factory/ResourceFactoryInterface.php';
require_once __DIR__ . '/Factory/Concrete/AwsResourceFactory.php';
require_once __DIR__ . '/Factory/Concrete/GoogleCloudResourceFactory.php';


class Client {

    public function __construct(
        private readonly ResourceFactoryInterface $resourceFactory,
    )
    {

    }

    public function createInstance(
        int $instanceCapacity,
        string $storageSpaceMb
    ): CloudInstanceInterface
    {
        $cloudInstance = $this->resourceFactory->createInstance($instanceCapacity);
        $cloudStorage = $this->resourceFactory->createStorage($storageSpaceMb);

        $cloudInstance->attachStorage($cloudStorage);

        return $cloudInstance;
    }

}

$resourceFactory = new AwsResourceFactory();

// here we can change the factory to GoogleCloudResourceFactory at runtime
// and this will change the cloud instance and storage

$resourceFactory = new GoogleCloudResourceFactory();


$client = new StaticProxy\Client($resourceFactory);
$instance = $client->createInstance(
    1024,
    512
);

$instance->start();
$instance->stop();
