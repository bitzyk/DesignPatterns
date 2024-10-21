<?php

/**
 * Composite class
 *
 * The Form class is the composite that can contain both individual form elements and other composites.
 */
class Form implements FormElementInterface
{

    /**
     * @var FormElementInterface[]
     */
    private array $elements = [];

    public function __construct(
        private string $name
    )
    {

    }

    public function addElement(
        FormElementInterface $element
    ): void
    {
        $this->elements[] = $element;
    }

    public function render(): string
    {
        $formCode = "<form name='{$this->name}'>" . PHP_EOL;

        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        $formCode .= '</form>' . PHP_EOL;

        return $formCode;
    }
}
