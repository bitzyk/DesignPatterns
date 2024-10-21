<?php

/**
 * The only operation valid after card is ejected is to finish the session
 * After that the ATM will go back to idle state
 */
class CardEjectedState implements AtmStateInterface
{
    public function finishSession(AtmMachine $atmMachine): void
    {
        // validate previous state
        if (! $atmMachine->getAtmState() instanceof self) {
            throw new \Exception('Invalid state transition');
        }

        // simulate process
        echo sprintf(
            "Session finished. ATM will go back to idle state.\n"
        );

        // reset the current user transaction
        $atmMachine->setCurrentUserTransaction(null);

        // change the state to the next one
        $atmMachine->setAtmState(new IdleState());
    }

    public function startSession(AtmMachine $atmMachine): void
    {
        throw new \Exception('Invalid state transition');
    }

    public function insertCard(
        AtmMachine $atmMachine,
        string $cardNumber
    ): void
    {
        throw new \Exception('Invalid state transition');
    }

    public function insertPin(
        AtmMachine $atmMachine,
        string $pin
    ): void
    {
        throw new \Exception('Invalid state transition');
    }

    public function requestCash(
        AtmMachine $atmMachine,
        int $amount
    ): void
    {
        throw new \Exception('Invalid state transition');
    }

    public function ejectCard(
        AtmMachine $atmMachine,
    ): void
    {
        throw new \Exception('Invalid state transition');
    }

    public function cashProvided(
        AtmMachine $atmMachine,
        float $providedAmount
    ): void
    {
        throw new \Exception('Invalid state transition');
    }


}
