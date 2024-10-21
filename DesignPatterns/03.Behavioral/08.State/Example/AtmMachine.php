<?php

/**
 * This is our Context.
 *
 * Methods exposed to the client are not necessarily to be the same as the state
 */
class AtmMachine
{
    private AtmStateInterface $atmState;

    private string|null $currentUserTransaction = null;

    private float $cashAtmBalance = 1000;

    private float $cashRequested = 0;

    public function __construct()
    {
        // set the initial state to Idle
        $this->atmState = new IdleState();
    }

    public function startUserSession()
    {
        $this->currentUserTransaction = $this->createUserTransaction();
        $this->atmState->startSession($this);
    }

    public function insertCard(string $cardNumber): void
    {
        $this->atmState->insertCard(
            $this,
            $cardNumber
        );
    }

    public function insertPin(string $pin): void
    {
        $this->atmState->insertPin(
            $this,
            $pin
        );
    }

    public function requestCash(int $amount): void
    {
        if ($amount > $this->cashAtmBalance) {
            echo sprintf(
                "ATM does not have enough cash to provide the requested amount. Card will be ejected and seession closed.\n"
            );

            $this->atmState->ejectCard($this);
            $this->atmState->finishSession($this);

            return;
        }

        $this->atmState->requestCash(
            $this,
            $amount
        );

        $this->cashRequested = $amount;
    }

    public function provideCash(): void
    {
        $this->atmState->cashProvided(
            $this,
            $this->cashRequested
        );

        $this->cashAtmBalance -= $this->cashRequested;


    }

    public function ejectCard(): void
    {
        $this->atmState->ejectCard(
            $this
        );

        $this->atmState->finishSession($this);

    }

    public function getAtmState(): AtmStateInterface
    {
        return $this->atmState;
    }

    public function setAtmState(AtmStateInterface $atmState): void
    {
        $this->atmState = $atmState;
    }

    private function createUserTransaction(): string
    {
        return uniqid();
    }

    public function getCurrentUserTransaction(): ?string
    {
        return $this->currentUserTransaction;
    }

    public function setCurrentUserTransaction(?string $currentUserTransaction): void
    {
        $this->currentUserTransaction = $currentUserTransaction;
    }


}
