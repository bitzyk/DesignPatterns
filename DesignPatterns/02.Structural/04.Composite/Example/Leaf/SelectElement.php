<?php

/**
 * Leaf class for Input
 *
 * The client can treat leaf objects directly or via the composite (i.e. Form class for our example)
 */
class SelectElement implements FormElementInterface
{
    public function __construct(
        private string $name,
        private array $options
    )
    {

    }
    public function render(): string
    {
        $select = sprintf('<select name="%s">', $this->name) . PHP_EOL;

        foreach ($this->options as $key => $value) {
            $select .= sprintf('<option value="%s">%s</option>', $key, $value) . PHP_EOL;
        }

        $select .= '</select>' . PHP_EOL;

        return $select;
    }
}
