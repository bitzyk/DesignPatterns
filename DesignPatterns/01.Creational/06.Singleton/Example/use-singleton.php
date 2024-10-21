<?php

require_once __DIR__ . '/DB.php';


$dbInstance = DB::getInstance();

$results = $dbInstance->query('SELECT * FROM clients');

$results = $dbInstance->query('SELECT * FROM products');


$dbInstance2 = DB::getInstance();


// here we are testing if the instances are the same
assert(
    $dbInstance === $dbInstance2,
    'The instances should be the same'
);

// here we are testing that cloning the instance is not possible
try {
    $dbInstance3 = clone $dbInstance;
} catch (Exception $e) {
    assert(
        $e instanceof Throwable,
        'You should not be able to clone a singleton'
    );
}



