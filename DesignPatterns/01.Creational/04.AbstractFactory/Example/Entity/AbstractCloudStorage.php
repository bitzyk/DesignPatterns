<?php

abstract class AbstractCloudStorage
{
    public function __construct(
        private readonly int $spaceMb
    )
    {

    }
}
