<?php

/**
 * NullStorage is a concrete implementation of the StorageInterface that does nothing.
 *
 * This is useful in case of unit testing, where we don't want to actually save the report.
 */
class NullStorage implements StorageInterface
{
    public function save(string $content): void
    {
        // do nothing
    }

}
