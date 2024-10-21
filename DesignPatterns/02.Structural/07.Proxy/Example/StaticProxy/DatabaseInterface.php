<?php

namespace StaticProxy;
/**
 * DatabaseInterface interface
 *
 * It will be implemented by both the RealSubject and the Proxy.
 */
interface DatabaseInterface
{
    public function query(
        string $query,
    ): array;
}
