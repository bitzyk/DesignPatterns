<?php

/**
 * This is a dynamic proxy class that will benchmark the execution time of the methods of the real object
 *
 * This is a simple example of a dynamic proxy, which is a class that wraps another object and intercepts
 */
class BenchmarkProxy
{

    public function __construct(
        private $realObject
    ) {
    }

    public function __call($method, $args) {
        // Start the timer
        $startTime = microtime(true);

        // Call the actual method on the real object
        $result = call_user_func_array([$this->realObject, $method], $args);

        // End the timer
        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;

        // Log or store the benchmark data
        echo sprintf(
            "Method `%s` on service `%s` executed in %f seconds\n",
            $method,
            get_class($this->realObject),
            $executionTime
        );

        return $result;
    }
}
