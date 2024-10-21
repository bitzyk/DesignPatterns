<?php

/**
 * The Component interface declares common operations for both simple and complex objects
 *
 * This pattern could easily extend into more complex scenarios, such as handling validation, grouping form elements (like fieldsets), or creating reusable form structures.
 */
interface FormElementInterface
{
    public function render(): string;
}
