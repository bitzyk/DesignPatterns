<?php

/**
 * The only operation valid when the ATM is in card inserted state is inserting a pin
 * After that the ATM will go to pin entered state
 */
class CardInsertedState implements AtmStateInterface
{

    public function insertPin(
        AtmMachine $atmMachine,
        string $pin
    ): void
    {
        // validate previous state
        if (! $atmMachine->getAtmState() instanceof self) {
            throw new \Exception('Invalid state transition');
        }

        // simulate processing
        echo sprintf(
            'Pin inserted: `%s`' . PHP_EOL,
            $pin
        );

        // change the state to the next one
        $atmMachine->setAtmState(new PinEnteredState());
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
