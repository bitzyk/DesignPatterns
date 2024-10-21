<?php

abstract class AbstractCloudInstance
{
    public function __construct(
        private readonly int $capacity,
    )
    {

    }
}
