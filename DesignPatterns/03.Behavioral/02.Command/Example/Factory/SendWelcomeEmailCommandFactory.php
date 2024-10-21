<?php

class SendWelcomeEmailCommandFactory extends AbstractCommandFactory
{

    public function createCommand(array $context): CommandInterface
    {
        return new SendWelcomeEmailCommand(
            $context['email'],
            $context['name'],
        );
    }
}
