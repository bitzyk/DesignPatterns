<?php


require_once __DIR__ . '/Modules/Service1.php';
require_once __DIR__ . '/Modules/Service2.php';
require_once __DIR__ . '/BenchmarkProxy.php';


class Client
{
    private Service1 $service1;
    private Service2 $service2;

    public function __construct()
    {
        $this->service1 = new Service1();
        $this->service2 = new Service2();
    }

    /**
     * We can use the same proxy class to wrap different objects.
     * This way, we benchmark the execution time of the methods of both objects.
     *
     */
    public function withProxy(
    ): void
    {
        /** @var Service1 $benchmarkProxy */
        $benchmarkProxy = new BenchmarkProxy($this->service1);

        $benchmarkProxy->method1();
        $benchmarkProxy->method2();
        $benchmarkProxy->method2();

        /** @var Service2 $benchmarkProxy */
        $benchmarkProxy = new BenchmarkProxy($this->service2);

        $benchmarkProxy->method1();
        $benchmarkProxy->method2();
        $benchmarkProxy->method2();
    }

    /**
     * In this case, we call the methods directly on the real objects.
     * The benchmarking is not performed because the proxy is not used.
     */
    public function withoutProxy(
    ): void
    {
        $this->service1->method1();
        $this->service1->method2();
        $this->service1->method2();

        $this->service2->method1();
        $this->service2->method2();
        $this->service2->method2();
    }

}

$client = new Client();

echo sprintf(
    "----\nWith proxy:\n"
);
$client->withProxy();

echo sprintf(
    "----\nWithout proxy:\n"
);
$client->withoutProxy();
