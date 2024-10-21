<?php

class CommandFactoryRepository
{
    private const array FACTORY_MAP = [
        CreateEmployeeCommand::class => CreateEmployeeCommandFactory::class,
        SendWelcomeEmailCommand::class => SendWelcomeEmailCommandFactory::class,
        AssignTrainerCommand::class => AssignTrainerCommandFactory::class,
    ];

    /**
     * @var AbstractCommandFactory[]
     */
    private static array $factories = [];


    public function getFactory(string $command): AbstractCommandFactory
    {
        if (! isset(self::$factories[$command])) {
            // create factory only once
            self::$factories[$command] = new (self::FACTORY_MAP[$command])();
        }

        return self::$factories[$command];
    }
}
