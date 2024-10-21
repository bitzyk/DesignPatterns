<?php

/**
 * Terminal expression for specific validation
 *
 * EmailValidRule
 */
class IsAdminRule extends AbstractValidationRule implements ValidationRuleInterface
{

    public function execute(array $context): bool
    {
        return isset($context['userRole']) && $context['userRole'] === 'admin';
    }

}
