<?php

/**
 * The only operation valid after the cash is provided is ejecting the card
 * After that the ATM will go to card ejected state
 */
class CashProvidedState implements AtmStateInterface
{

    public function ejectCard(
        AtmMachine $atmMachine,
    ): void
    {

        // validate previous state
        if (! $atmMachine->getAtmState() instanceof self) {
            throw new \Exception('Invalid state transition');
        }

        // simulate process
        echo sprintf(
            "Card ejected.\n"
        );

        // change the state to the next one
        $atmMachine->setAtmState(new CardEjectedState());
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
