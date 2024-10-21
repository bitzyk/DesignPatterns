<?php

class CreateEmployeeService
{

    public function createEmployee(
        string $name,
        string $position,
    ): void
    {
        echo sprintf(
            "Creating employee record for %s, %s\n",
            $name,
            $position
        ); // simulating database record creation
    }
}
