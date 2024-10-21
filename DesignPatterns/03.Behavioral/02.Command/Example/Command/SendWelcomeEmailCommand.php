<?php

class SendWelcomeEmailCommand implements CommandInterface
{

    private EmailService $service;

    public function __construct(
        private readonly string $email,
        private readonly string $name,
    )
    {
        // of course the service should be injected in real world scenario
        $this->service = new EmailService();
    }

    public function execute(): void
    {
        $this->service->sentEmail(
            $this->email,
            $this->name
        );
    }

}
