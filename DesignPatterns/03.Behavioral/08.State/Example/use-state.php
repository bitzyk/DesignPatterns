<?php

require_once __DIR__ . '/AtmStateInterface.php';
require_once __DIR__ . '/AtmMachine.php';


require_once __DIR__ . '/AtmState/IdleState.php';
require_once __DIR__ . '/AtmState/SessionStartedState.php';
require_once __DIR__ . '/AtmState/CardInsertedState.php';
require_once __DIR__ . '/AtmState/PinEnteredState.php';
require_once __DIR__ . '/AtmState/CashRequestedState.php';
require_once __DIR__ . '/AtmState/CashProvidedState.php';
require_once __DIR__ . '/AtmState/CardEjectedState.php';


$atmMachine = new AtmMachine();


assert(
    $atmMachine->getAtmState() instanceof IdleState,
    'The ATM should be in idle state after creation'
);

$atmMachine->startUserSession();

assert(
    $atmMachine->getAtmState() instanceof SessionStartedState,
    'The ATM should be in session started state after starting a session'
);


$atmMachine->insertCard('1234567890');

assert(
    $atmMachine->getAtmState() instanceof CardInsertedState,
    'The ATM should be in card inserted state after inserting a card'
);


try {
    $atmMachine->insertCard('1234567890');
} catch (Exception $e) {
    assert(
        $e->getMessage() === 'Invalid state transition',
        'The ATM should not allow to insert a card twice'
    );
}

$atmMachine->insertPin('2639');

assert(
    $atmMachine->getAtmState() instanceof PinEnteredState,
    'The ATM should be in pin entered state after entering a pin'
);

$atmMachine->requestCash(100);

assert(
    $atmMachine->getAtmState() instanceof CashRequestedState,
    'The ATM should be in cash requested state after requesting cash'
);

$atmMachine->provideCash();

try {
    $atmMachine->requestCash(100);
} catch (Exception $e) {
    assert(
        $e->getMessage() === 'Invalid state transition',
        'The ATM should not allow to request cash twice'
    );
}

$atmMachine->ejectCard();

assert(
    $atmMachine->getAtmState() instanceof IdleState,
    'The ATM should be in idle state after ejecting the card'
);


$atmMachine->startUserSession();
$atmMachine->insertCard('1234567890');
$atmMachine->insertPin('2639');

$atmMachine->requestCash(12322);

assert(
    $atmMachine->getAtmState() instanceof IdleState,
    'The ATM should be in idle state after requesting cash that is not available'
);
