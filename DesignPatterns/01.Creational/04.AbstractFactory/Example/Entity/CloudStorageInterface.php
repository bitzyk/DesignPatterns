<?php

interface CloudStorageInterface
{
    public function getId(): string;

    public function save($data): string;

    public function getData(string $resourceId): mixed;
}
