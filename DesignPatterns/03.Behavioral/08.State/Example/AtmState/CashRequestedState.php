<?php

/**
 * The only operation valid after cash is requested is to provide the cash
 * After that the ATM will go to card ejected state
 */
class CashRequestedState implements AtmStateInterface
{
    public function cashProvided(
        AtmMachine $atmMachine,
        float $providedAmount
    ): void
    {

        // validate previous state
        if (! $atmMachine->getAtmState() instanceof self) {
            throw new \Exception('Invalid state transition');
        }

        // simulate processing
        echo sprintf(
            "Providing cash %.2f\n",
            $providedAmount
        );

        // change the state to the next one
        $atmMachine->setAtmState(new CashProvidedState());
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


    public function finishSession(AtmMachine $atmMachine): void
    {
        throw new \Exception('Invalid state transition');
    }

}
