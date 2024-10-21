<?php

final class DB // with final keyword, the class cannot be extended
{
    private static $instance; // static property to hold the instance

    private function __construct(
        private string $dsn = '',
    )
    {
        // call the connect method
        $this->connect();
    }

    public static function getInstance(): DB
    {
        if (self::$instance === null) {
            self::$instance = new DB(
                'mysql:host=localhost;dbname=test'
            );
        }

        return self::$instance;
    }

    public function __clone(): void
    {
        // this will prevent the instance from being cloned -> a singleton should not be cloned
        throw new \RuntimeException('Cloning is not allowed in a Singleton pattern');
    }


    public function query(string $sql): array
    {
        echo sprintf(
            'You run the query: %s',
            $sql
        ) . PHP_EOL;

        $results = [
            ['name' => 'John Doe'],
            ['name' => 'Jane Doe'],
        ]; // simulate the results

        return $results;
    }

    private function connect(): void
    {
        // connect to the database
    }
}
