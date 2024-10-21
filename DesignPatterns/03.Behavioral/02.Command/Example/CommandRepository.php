<?php

class CommandRepository
{
    private CommandFactoryRepository $factoryRepository;

    /**
     * This data will be taken from queue or database in real world scenario
     */
    private const array DATA = [
        [
            'command' => CreateEmployeeCommand::class,
            'context' => [
                'name' => 'John Doe',
                'position' => 'Designer',
            ],
        ],
        [
            'command' => CreateEmployeeCommand::class,
            'context' => [
                'name' => 'Bitoi Cristian',
                'position' => 'Software Engineer',
            ],
        ],

        [
            'command' => CreateEmployeeCommand::class,
            'context' => [
                'name' => 'Marius Ionescu',
                'position' => 'Trainer',
            ],
        ],

        [
            'command' => SendWelcomeEmailCommand::class,
            'context' => [
                'email' => 'cristi.bitoi@gmail.com',
                'name' => 'Bitoi Cristian',
            ],
        ],

        [
            'command' => AssignTrainerCommand::class,
            'context' => [
                'trainerName' => 'Marius Ionescu',
                'employeeName' => 'Bitoi Cristian',
            ],
        ],
    ];

    public function __construct()
    {
        $this->factoryRepository = new CommandFactoryRepository(); // of course this will be injected in real world scenario
    }

    /**
     * @return CommandInterface[]
     */
    public function getCommands(): array
    {
        $commands = [];

        foreach (self::DATA as $data) {
            $factory = $this->factoryRepository->getFactory($data['command']);

            $commands[] = $factory->createCommand($data['context']);
        }

        return $commands;
    }


}
