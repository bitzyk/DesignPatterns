<?php

/**
 * Terminal expression for specific validation
 *
 * EmailValidRule
 */
class EmailValidRule extends AbstractValidationRule implements ValidationRuleInterface
{

    public function execute(array $context): bool
    {
        return isset($context['email']) && filter_var($context['email'], FILTER_VALIDATE_EMAIL) !== false;
    }

}
