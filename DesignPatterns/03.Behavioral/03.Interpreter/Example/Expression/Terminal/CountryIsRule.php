<?php

/**
 * Terminal expression for specific validation
 *
 * CountryIsRule
 */
class CountryIsRule extends AbstractValidationRule implements ValidationRuleInterface
{

    public function execute(array $context): bool
    {
        return isset($context['countryCode']) && $context['countryCode'] === $this->ruleConfig['countryCode'];
    }

}
