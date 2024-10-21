<?php

abstract class AbstractIterator implements IteratorInterface
{

    private int $position = 0;

    public function __construct(
        private readonly array $items
    )
    {
    }

    public function hasNext(): bool
    {
        return isset($this->items[$this->position + 1]);
    }

    public function current(): mixed
    {
        return $this->items[$this->position];
    }

    public function next(): mixed
    {
        if (! $this->hasNext()) {
            return null;
        }

        $this->position++;

        return $this->current();
    }

    public function previous(): mixed
    {
        if ($this->position === 0) {
            throw new \LogicException('We are already at the beginning of the collection.');
        }

        $this->position--;
        return $this->current();
    }

    public function reset(): void
    {
        $this->position = 0;
    }

    public function key(): int
    {
        return $this->position;
    }

}
