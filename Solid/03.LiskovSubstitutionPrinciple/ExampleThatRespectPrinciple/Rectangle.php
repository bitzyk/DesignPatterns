<?php

namespace Solid\LiskovSubstitutionPrinciple\ExampleThatRespectPrinciple;

class Rectangle implements ShapeInterface
{

    public function __construct(
        private int $width,
        private int $height
    )
    {
    }

    public function computeArea(): float
    {
        return $this->width * $this->height;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }


}
