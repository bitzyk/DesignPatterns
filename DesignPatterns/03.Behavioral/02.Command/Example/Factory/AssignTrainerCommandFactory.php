<?php

class AssignTrainerCommandFactory extends AbstractCommandFactory
{
    public function createCommand(array $context): CommandInterface
    {
        return new AssignTrainerCommand(
            $context['employeeName'],
            $context['trainerName'],
        );
    }

}
