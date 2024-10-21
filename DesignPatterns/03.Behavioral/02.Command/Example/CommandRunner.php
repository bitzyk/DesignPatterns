<?php

class CommandRunner
{
    /**
     * @var CommandInterface[]
     */
    private array $commands = [];

    private int $counter = 0;
    public function addCommand(CommandInterface $command): void
    {
        $this->commands[] = $command;
    }

    public function run(): void
    {
        foreach ($this->commands as $command) {

            $this->counter++;

            echo sprintf(
                "Running command with counter `%d` and class `%s`\n",
                $this->counter,
                get_class($command)
            );

            $command->execute();
        }
    }
}
