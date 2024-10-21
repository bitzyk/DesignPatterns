<?php

class Request implements PrototypeInterface
{

    private string $costlyData = '';

    private bool $requestSent = false;

    public function __construct(
        private string $method,
        private string $uri,
        private array $data,
        private array $headers,
    )
    {
        $this->costlyOperation(); // simulate a costly operation at the time of object creation
    }

    public function __clone(): void
    {
        // when we clone we want to reset the requestSent flag
        // because the previous request was already sent
        $this->requestSent = false;
    }

    private function costlyOperation(): void
    {
        sleep(2); // simulate a costly operation
        $this->costlyData = 'simulate costly data';
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }


    public function setRequestId(int $requestId): void
    {
        $this->data['requestId'] = $requestId;
    }

    public function getRequestId(): int
    {
        return $this->data['requestId'];
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setRequestSent(bool $requestSent): void
    {
        $this->requestSent = $requestSent;
    }


}
