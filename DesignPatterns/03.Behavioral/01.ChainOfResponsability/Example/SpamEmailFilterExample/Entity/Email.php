<?php

class Email
{

    public function __construct(
        private readonly string $from,
        private readonly string $to,
        private readonly string $subject,
        private readonly string $body,
        private string $attachment = ''
    )
    {
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getAttachment(): string
    {
        return $this->attachment;
    }

}
