<?php

require_once __DIR__ . '/Entity/DatabaseConnection.php';
require_once __DIR__ . '/DatabaseConnectionPoolInterface.php';
require_once __DIR__ . '/DatabaseConnectionPool.php';


$pool = new DatabaseConnectionPool(3);

// Client 1 requests a connection
$connection1 = $pool->getConnection();
assert($connection1 instanceof DatabaseConnection);
echo "Client 1 got a connection\n";

// Client 1 requests a connection
$connection2 = $pool->getConnection();
assert($connection2 instanceof DatabaseConnection);
echo "Client 2 got a connection\n";

// Client 1 requests a connection
$connection3 = $pool->getConnection();
assert($connection3 instanceof DatabaseConnection);
echo "Client 3 got a connection\n";

// Client 1 requests a connection
try {
    $connection1 = $pool->getConnection();
} catch (Throwable $e) {
    assert($e instanceof Exception);
    echo "Client 4 got an exception because the pool is in use by other clients\n";
}

