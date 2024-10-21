<?php

/**
 * The only operation valid when the ATM is in idle state is starting a session
 * After that the ATM will go to session started state
 */
class IdleState implements AtmStateInterface
{
    public function startSession(AtmMachine $atmMachine): void
    {
        // validate previous state
        if (! $atmMachine->getAtmState() instanceof self) {
            throw new \Exception('Invalid state transition');
        }

        // simulate processing
        echo sprintf(
            'Session started at %s. Transaction ID: `%s`.' . PHP_EOL,
            date('Y-m-d H:i:s'),
            $atmMachine->getCurrentUserTransaction()
        );

        // change the state to the next one
        $atmMachine->setAtmState(new SessionStartedState());
    }

    public function insertCard(
        AtmMachine $atmMachine,
        string $cardNumber
    ): void
    {

        throw new \Exception('You have to start a session first');
    }

    public function insertPin(
        AtmMachine $atmMachine,
        string $pin
    ): void
    {
        throw new \Exception('You have to start a session first');
    }

    public function requestCash(
        AtmMachine $atmMachine,
        int $amount
    ): void
    {
        throw new \Exception('You have to start a session first');
    }

    public function ejectCard(
        AtmMachine $atmMachine,
    ): void
    {
        throw new \Exception('You have to start a session first');
    }

    public function cashProvided(
        AtmMachine $atmMachine,
        float $providedAmount
    ): void
    {
        throw new \Exception('You have to start a session first');
    }

    public function finishSession(AtmMachine $atmMachine): void
    {
        throw new \Exception('You have to start a session first');
    }


}
