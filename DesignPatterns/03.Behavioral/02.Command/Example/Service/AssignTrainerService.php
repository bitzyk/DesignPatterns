<?php

class AssignTrainerService
{
    public function assignTrainer(
        string $employeeName,
        string $traineeName
    ): void
    {
        echo sprintf(
            "Assigning trainer %s to trainee %s.\n",
            $employeeName,
            $traineeName
        );
    }
}
