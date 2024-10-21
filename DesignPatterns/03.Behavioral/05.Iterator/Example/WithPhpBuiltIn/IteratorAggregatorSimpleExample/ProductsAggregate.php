<?php

class ProductsAggregate implements IteratorAggregate
{
    public function __construct(
        private readonly array $products
    ) {
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->products);
    }


}
