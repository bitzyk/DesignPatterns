<?php

class GoogleCloudStorage extends AbstractCloudStorage implements CloudStorageInterface
{

    private string $storageId;

    public function __construct(
        private readonly int $spaceMb
    )
    {
        parent::__construct($spaceMb);

        // generate id for the storage id
        $this->storageId = 'google-' . rand(1000, 9999); // mimic a generated ID
    }

    public function getId(): string
    {
        echo sprintf(
            'Getting Google Cloud storage ID' . PHP_EOL,
        );

        return $this->storageId;
    }

    public function save($data): string
    {
        echo sprintf(
            'Saving data to Google Cloud storage' . PHP_EOL,
        );

        return 'Google-123'; // mimic a generated ID
    }

    public function getData(string $resourceId): mixed
    {
        echo sprintf(
            'Getting data from Google Cloud storage' . PHP_EOL,
        );

        return 'Google data'; // mimic data
    }

}
