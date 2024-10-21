<?php

namespace Solid\LiskovSubstitutionPrinciple\ExampleThatRespectPrinciple;

require __DIR__ . '/ShapeInterface.php';
require __DIR__ . '/Rectangle.php';
require __DIR__ . '/Square.php';

class TestPrinciple
{
    public function test()
    {
        $rectangle = new Rectangle(2, 3);
        $this->testRectangle($rectangle);

        $square = new Square(2);
        $this->testSquare($square);
    }

    private function testRectangle(
        Rectangle $rectangle,
    )
    {
        $rectangle->setWidth(3);
        $rectangle->setHeight(2);

        assert($rectangle->getWidth() == 3);
        assert($rectangle->getHeight() == 2);
        assert($rectangle->computeArea() == 6);
    }

    private function testSquare(
        Square $square,
    )
    {
        // the square separately - it's not a special case of a rectangle
        $square->setSide(3);

        assert($square->getSide() == 3);
        assert($square->computeArea() == 9);
    }
}


$test = new TestPrinciple();
$test->test();
