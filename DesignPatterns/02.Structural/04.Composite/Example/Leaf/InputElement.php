<?php

/**
 * Leaf class for Input
 *
 * The client can treat leaf objects directly or via the composite (i.e. Form class for our example)
 */
class InputElement implements FormElementInterface
{
    public function __construct(
        private string $name,
        private string $type = 'text'
    ) {

    }

    public function render(): string {
        return "<input type='{$this->type}' name='{$this->name}'>" . PHP_EOL;
    }
}
