<?php

class FileSystemStorage implements StorageInterface
{
    public function save(string $content): void
    {
        echo sprintf(
            "Saved in file: %s\n",
            $content
        ); // simulating file system storage
    }

}
