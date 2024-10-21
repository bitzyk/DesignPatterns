<?php

class AssignTrainerCommand implements CommandInterface
{

    private AssignTrainerService $service;

    public function __construct(
        private readonly string $employeeName,
        private readonly string $trainerName,
    )
    {
        // of course the service should be injected in real world scenario
        $this->service = new AssignTrainerService();
    }

    public function execute(): void
    {
        $this->service->assignTrainer(
            $this->employeeName,
            $this->trainerName
        );
    }

}
