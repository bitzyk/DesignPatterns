<?php

class ReportGenerator
{
    public function __construct(
        private readonly StorageInterface $storage
    )
    {

    }

    public function generateReport(): void
    {
        $content = 'Report content'; // simulating report content

        $this->storage->save($content);
    }
}
