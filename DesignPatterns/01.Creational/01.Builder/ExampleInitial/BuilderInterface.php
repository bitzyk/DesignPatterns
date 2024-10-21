<?php

interface BuilderInterface
{
    public function build(array $data): void;

    public function getEntity(): object;
}
