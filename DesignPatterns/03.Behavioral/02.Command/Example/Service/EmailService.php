<?php

class EmailService
{
    public function sentEmail(
        string $email,
        string $name,
    ): void
    {
        echo sprintf(
            "Sending email to `%s` with name `%s`\n",
            $email,
            $name
        );
    }
}
