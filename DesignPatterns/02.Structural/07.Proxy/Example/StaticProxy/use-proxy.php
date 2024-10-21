<?php

namespace StaticProxy;

require_once __DIR__ . '/DatabaseInterface.php';
require_once __DIR__ . '/RealDatabase.php';
require_once __DIR__ . '/DatabaseCacheProxy.php';


class Client
{

    /**
     * We execute the same query multiple times
     * but due to proxy -> the real query is executed only once
     *
     * @param DatabaseInterface $database
     * @return void
     */
    public function withProxy(
        DatabaseInterface $database,
    ): void
    {
        $query = 'SELECT * FROM table';

        for ($i = 0; $i < 10; $i++) {
            // we execute the same query multiple times
            // but due to proxy -> the real query is executed only once
            $database->query($query);
        }
    }

    public function withoutProxy(
        DatabaseInterface $database,
    ): void
    {
        $query = 'SELECT * FROM table';

        for ($i = 0; $i < 10; $i++) {
            // we execute the same query multiple times
            // because we don't have a proxy -> the real query is executed every time
            $database->query($query);
        }
    }


}

$client = new Client();

echo sprintf(
    "----\nWith proxy:\n"
);
$client->withProxy(
    new DatabaseCacheProxy(
        new RealDatabase()
    )
);

echo sprintf(
    "----\nWithout proxy:\n"
);
$client->withoutProxy(
    new RealDatabase()
);
