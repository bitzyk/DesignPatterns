<?php

class S3Storage extends AbstractCloudStorage implements CloudStorageInterface
{

    private string $bucketName;

    public function __construct(
        private readonly int $spaceMb
    )
    {
        parent::__construct($spaceMb);

        // generate id for the bucket
        $this->bucketName = 's3-' . rand(1000, 9999); // mimic a generated ID
    }

    public function getId(): string
    {
        echo sprintf(
            'Getting S3 storage ID' . PHP_EOL,
        );

        return $this->bucketName;
    }

    public function save($data): string
    {
        echo sprintf(
            'Saving data to S3 storage' . PHP_EOL,
        );

        return 'S3-123'; // mimic a generated ID
    }

    public function getData(string $resourceId): mixed
    {
        echo sprintf(
            'Getting data from S3 storage' . PHP_EOL,
        );

        return 'S3 data'; // mimic data
    }


}
