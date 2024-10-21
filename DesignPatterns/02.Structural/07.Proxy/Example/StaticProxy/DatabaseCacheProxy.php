<?php

namespace StaticProxy;

/**
 * The Proxy that caches query results.
 */
class DatabaseCacheProxy implements DatabaseInterface
{

    private array $cache = [];

    /**
     * We keep a reference to the real database that will allow us to execute the query if it is not already cached.
     *
     */
    public function __construct(
        private readonly DatabaseInterface $realDatabase,
    )
    {
    }

    public function query(string $query): array
    {
        if (!isset($this->cache[$query])) {
            // we execute only if a similar query and his result is not already cached
            $this->cache[$query] = $this->realDatabase->query($query);
        }

        return $this->cache[$query];
    }


}
