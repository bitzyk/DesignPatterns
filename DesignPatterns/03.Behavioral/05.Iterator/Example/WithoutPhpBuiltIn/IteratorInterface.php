<?php

interface IteratorInterface
{
    public function hasNext(): bool;

    public function current(): mixed;

    public function next(): mixed;

    public function previous(): mixed;

    public function reset(): void;

    public function key(): int;

    public function valid(): bool;
}
