<?php

require __DIR__ . '/IteratorInterface.php';
require __DIR__ . '/AbstractIterator.php';
require __DIR__ . '/Collection/ProductCollection.php';

$productCollection = new ProductCollection([
    'Product 1',
    'Product 2',
    'Product 3',
    'Product 4',
    'Product 5',
]);

assert(
    $productCollection->current() === 'Product 1',
);
assert(
    $productCollection->next() === 'Product 2',
);
assert(
    $productCollection->previous() === 'Product 1',
);

try {
    $productCollection->previous();
} catch (Exception $e) {
    assert(
        $e->getMessage() === 'We are already at the beginning of the collection.',
    );
}

assert(
    $productCollection->current() === 'Product 1',
);

assert(
    $productCollection->next() === 'Product 2',
);

$productCollection->reset();

assert(
    $productCollection->current() === 'Product 1',
);

$productCollection->next();
$productCollection->next();
$productCollection->next();

assert(
    $productCollection->hasNext() === true
);

$productCollection->next();
assert(
    $productCollection->current() === 'Product 5',
);

assert(
    $productCollection->hasNext() === false
);

assert(
    $productCollection->next() === null
);

assert(
    $productCollection->current() === 'Product 5',
);
