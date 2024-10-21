<?php

interface DatabaseConnectionPoolInterface
{
    public function getConnection(): DatabaseConnection;

    public function releaseConnection(DatabaseConnection $connection): void;
}
