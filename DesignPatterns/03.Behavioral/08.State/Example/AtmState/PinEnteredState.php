<?php

/**
 * The only operation valid after the pin is entered is requesting cash
 * After that the ATM will go to cash requested state
 */
class PinEnteredState implements AtmStateInterface
{

    public function requestCash(
        AtmMachine $atmMachine,
        int $amount
    ): void
    {

        // validate previous state
        if (! $atmMachine->getAtmState() instanceof self) {
            throw new \Exception('Invalid state transition');
        }

        // simulate processing
        echo sprintf(
            'Cash requested: `%s`' . PHP_EOL,
            $amount
        );

        // change the state to the next one
        $atmMachine->setAtmState(new CashRequestedState());
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


    /**
     * In case that the requested amount is not available in the ATM
     * this method should also be allowed
     */
    public function ejectCard(
        AtmMachine $atmMachine,
    ): void
    {
        $atmMachine->setAtmState(new CardEjectedState());
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
