<?php

namespace Solid\LiskovSubstitutionPrinciple\ExampleThatBreakPrinciple;

require __DIR__ . '/Rectangle.php';
require __DIR__ . '/Square.php';

class TestPrinciple
{
    public function test()
    {
        $rectangle = new Rectangle(2, 3);
        $square = new Square(2);

        $this->testRectangle($rectangle);
        $this->testRectangle($square);
    }

    private function testRectangle(
        Rectangle $rectangle
    )
    {
        $rectangle->setWidth(3);
        $rectangle->setHeight(2);

        assert($rectangle->getWidth() == 3);

        /**
         * This assertion will fail because the square class
         * does not respect the Liskov Substitution Principle
         * In other words we replaced the superclass (i.e. Rectangle) with the subclass (i.e. Square)
         * and this affected the behavior of the program
         *
         * To fix this we can define an interface that will contain only behaviors that are common to both classes
         */
        assert($rectangle->getHeight() == 2);
    }
}


$test = new TestPrinciple();
$test->test();
