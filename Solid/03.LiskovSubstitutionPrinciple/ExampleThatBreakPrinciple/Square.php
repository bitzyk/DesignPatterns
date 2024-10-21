<?php

namespace Solid\LiskovSubstitutionPrinciple\ExampleThatBreakPrinciple;

class Square extends Rectangle
{

    public function __construct(int $width)
    {
        parent::__construct($width, $width);
    }

    public function setWidth(int $width): void
    {
        $this->setSide($width);
    }

    public function setHeight(int $height): void
    {
        $this->setSide($height);
    }

    private function setSide(int $size)
    {
        parent::setWidth($size);
        parent::setHeight($size);
    }


}
