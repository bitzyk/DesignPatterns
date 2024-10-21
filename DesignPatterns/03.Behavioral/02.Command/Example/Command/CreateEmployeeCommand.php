<?php

class CreateEmployeeCommand implements CommandInterface
{
    private CreateEmployeeService $service;

    public function __construct(
        private readonly string $name,
        private readonly string $position,
    )
    {
        // of course the service should be injected in real world scenario
        $this->service = new CreateEmployeeService();
    }

    public function execute(): void
    {
        $this->service->createEmployee($this->name, $this->position);
    }

}
