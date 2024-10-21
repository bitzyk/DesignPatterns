<?php


class TransportMessage
{
    public function __construct(
        private string $message,
        private array $context,
    )
    {

    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getAuthToken(): ?string
    {
        return $this->context['authToken'] ?? null;
    }
}
