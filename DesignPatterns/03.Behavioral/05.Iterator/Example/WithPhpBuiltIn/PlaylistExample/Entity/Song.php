<?php

class Song
{
    public function __construct(
        private readonly string $artist,
        private readonly string $name,
    )
    {

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

}
