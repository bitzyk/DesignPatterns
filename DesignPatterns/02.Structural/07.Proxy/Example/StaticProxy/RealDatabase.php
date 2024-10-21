<?php

namespace StaticProxy;

/**
 * The Real Subject that hits the database.
 *
 * Usually, the Real Subject does some useful work, such as downloading a file or querying a database.
 *
 * When the client code calls the proxy with the same data, it may have to send this data to the Real Subject.
 */
class RealDatabase implements DatabaseInterface
{
    public function query(string $query): array
    {
        echo sprintf(
            "Executing query: %s\n",
            $query
        );

        return [
            'result' => [
                'row1' => 'value1',
                'row2' => 'value2',
            ],
        ]; // simulating a database query
    }

}
