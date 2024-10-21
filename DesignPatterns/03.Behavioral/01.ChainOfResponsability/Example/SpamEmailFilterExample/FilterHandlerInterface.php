<?php

interface FilterHandlerInterface
{
    public function filter(Email $email): bool;

    public function setNext(FilterHandlerInterface $handler): FilterHandlerInterface;

}
