<?php

/**
 * The only operation valid when the ATM is in session started state is inserting a card
 * After that the ATM will go to card inserted state
 */
class SessionStartedState implements AtmStateInterface
{
    public function startSession(AtmMachine $atmMachine): void
    {
        throw new \Exception('Invalid state transition');
    }

    public function insertCard(
        AtmMachine $atmMachine,
        string $cardNumber
    ): void
    {
        // validate previous state
        if (! $atmMachine->getAtmState() instanceof self) {
            throw new \Exception('Invalid state transition');
        }

        // simulate processing
        echo sprintf(
            'Card inserted: `%s`' . PHP_EOL,
            $cardNumber
        );

        // change the state to the next one
        $atmMachine->setAtmState(new CardInsertedState());
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

    public function finishSession(AtmMachine $atmMachine): void
    {
        throw new \Exception('Invalid state transition');
    }


}
