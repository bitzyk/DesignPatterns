<?php

interface AtmStateInterface
{
    /**
     * It starts the session of the ATM
     *
     * The only valid prev state is Idle
     */
    public function startSession(
        AtmMachine $atmMachine
    ): void;

    public function insertCard(
        AtmMachine $atmMachine,
        string $cardNumber
    ): void;

    public function insertPin(
        AtmMachine $atmMachine,
        string $pin
    ): void;

    public function requestCash(
        AtmMachine $atmMachine,
        int $amount
    ): void;

    public function cashProvided(
        AtmMachine $atmMachine,
        float $providedAmount
    ): void;

    public function ejectCard(
        AtmMachine $atmMachine,
    ): void;

    public function finishSession(
        AtmMachine $atmMachine,
    ): void;
}
