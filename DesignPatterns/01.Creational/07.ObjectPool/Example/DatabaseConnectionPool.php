<?php

class DatabaseConnectionPool implements DatabaseConnectionPoolInterface  {

    private array $pool = [];
    private array $inUse = [];

    public function __construct(
        private readonly int $maxConnections = 5,
    )
    {

    }

    public function getConnection(): DatabaseConnection
    {
        // If the pool has available connections, reuse one from the pool
        if (! empty($this->pool)) {
            $connection = array_pop($this->pool);
            // store the connection in the inUse array, to not be picked up by the next getConnection call
            $this->inUse[spl_object_hash($connection)] = $connection;
            return $connection;
        }

        // If pool is empty and we can still create new connections
        if (count($this->inUse) < $this->maxConnections) {
            // create a new connection
            $connection = $this->createNewConnection();
            // add the connection to the inUse array
            $this->inUse[spl_object_hash($connection)] = $connection;
            return $connection;
        }

        // Otherwise, wait or handle the situation (e.g., throw an exception)
        throw new Exception('No available connections in the pool.');
    }

    public function releaseConnection(DatabaseConnection $connection): void
    {
        $hash = spl_object_hash($connection);

        if (isset($this->inUse[$hash])) {
            // remove the connection from the inUse array
            unset($this->inUse[$hash]);

            // Return the connection to the pool
            $this->pool[] = $connection;
        }
    }

    private function createNewConnection(): DatabaseConnection {
        return new DatabaseConnection();
    }


}
