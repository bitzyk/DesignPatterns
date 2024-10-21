<?php

require __DIR__ . '/ProductsAggregate.php';

$products = [
    [
        'name' => 'foo'
    ],
    [
        'name' => 'bar'
    ],
    [
        'name' => 'baz'
    ],
    [
        'name' => 'qux'
    ],
];

$productsAggregate = new ProductsAggregate($products);

echo sprintf(
    "Iterating over products with foreach loop:\n"
);
/*
 * Direct iteration without fetching the iterator
 * Foreach will automatically fetch the iterator and rewind it
 */
foreach ($productsAggregate as $product) {
    echo $product['name'] . PHP_EOL;
}

/*
 * Fetching the iterator explicitly will give you control over the iteration
 *
 * Maybe you want to get element on by one or you want to rewind the iterator
 */

/** @var ArrayIterator $iterator */
$iterator = $productsAggregate->getIterator();

assert(
    $iterator->current() == ['name' => 'foo'],
);
$iterator->next();
assert(
    $iterator->current() == ['name' => 'bar'],
);
$iterator->next();
assert(
    $iterator->current() == ['name' => 'baz'],
);
$iterator->next();
assert(
    $iterator->current() == ['name' => 'qux'],
);
$iterator->next();
assert(
    $iterator->current() === null,
);
assert(
    $iterator->valid() === false,
);

$iterator->rewind();
assert(
    $iterator->current() == ['name' => 'foo'],
);
assert(
    $iterator->valid() === true,
);
assert(
    $iterator->key() === 0,
);
$iterator->next();
assert(
    $iterator->key() === 1,
);


echo sprintf(
    "Iterating over products with foreach loop:\n"
);
/*
 * Direct iteration without fetching the iterator
 * Foreach will automatically fetch the iterator and rewind it
 */
foreach ($productsAggregate as $product) {
    echo $product['name'] . PHP_EOL;
}




