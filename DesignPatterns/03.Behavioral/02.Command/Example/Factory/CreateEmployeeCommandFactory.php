<?php

class CreateEmployeeCommandFactory extends AbstractCommandFactory
{
    public function createCommand(array $context): CommandInterface
    {
        return new CreateEmployeeCommand(
            $context['name'],
            $context['position']
        );
    }

}
