<?php

class DatabaseConnection
{

    public function __construct()
    {
        echo sprintf(
            'Costly operation to connect to the database' . PHP_EOL
        );
    }

    public function executeQuery(string $query): void
    {
        echo sprintf(
            'Simulate executing query: %s' . PHP_EOL,
            $query
        );
    }
}
