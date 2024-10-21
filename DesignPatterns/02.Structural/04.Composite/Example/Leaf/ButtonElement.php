<?php

/**
 * Leaf class for Input
 *
 * The client can treat leaf objects directly or via the composite (i.e. Form class for our example)
 */
class ButtonElement implements FormElementInterface
{
    public function __construct(
        private string $label
    ) {
    }

    public function render(): string {
        return "<button>{$this->label}</button>" . PHP_EOL;
    }
}
