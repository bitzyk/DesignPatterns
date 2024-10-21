<?php

interface StorageInterface
{
    public function save(string $content): void;
}
