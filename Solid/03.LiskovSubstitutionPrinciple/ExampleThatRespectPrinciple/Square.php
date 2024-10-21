<?php

namespace Solid\LiskovSubstitutionPrinciple\ExampleThatRespectPrinciple;

class Square implements ShapeInterface
{

    public function __construct(
        private int $side
    )
    {
    }

    public function computeArea(): float
    {
        return $this->side * $this->side;
    }

    public function getSide(): int
    {
        return $this->side;
    }

    public function setSide(int $side): void
    {
        $this->side = $side;
    }

}
