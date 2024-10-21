<?php

/**
 * MediatorInterface is a contract for the Mediator.
 *
 * The Mediator interface provides a method for components to communicate with each other.
 */
interface MediatorInterface
{
    public function notify(
        object $sender,
        EventEnum $event,
        array $context
    ): void;
}
