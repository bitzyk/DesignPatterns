<?php

require_once __DIR__ . '/CommandInterface.php';
require_once __DIR__ . '/Command/CreateEmployeeCommand.php';
require_once __DIR__ . '/Command/SendWelcomeEmailCommand.php';
require_once __DIR__ . '/Command/AssignTrainerCommand.php';
require_once __DIR__ . '/Factory/AbstractCommandFactory.php';
require_once __DIR__ . '/Factory/CommandFactoryRepository.php';
require_once __DIR__ . '/Factory/CreateEmployeeCommandFactory.php';
require_once __DIR__ . '/Factory/SendWelcomeEmailCommandFactory.php';
require_once __DIR__ . '/Factory/AssignTrainerCommandFactory.php';
require_once __DIR__ . '/Service/CreateEmployeeService.php';
require_once __DIR__ . '/Service/EmailService.php';
require_once __DIR__ . '/Service/AssignTrainerService.php';
require_once __DIR__ . '/CommandRepository.php';
require_once __DIR__ . '/CommandRunner.php';


// this process will usually be a standalone process running in the background or a cron job
// wil execute indefinitely until all commands are executed, and it will wait for new commands

$commandRepository = new CommandRepository();
$commandRunner = new CommandRunner();

$commands = $commandRepository->getCommands();

foreach ($commands as $command) {
    $commandRunner->addCommand($command);
}

$commandRunner->run();

