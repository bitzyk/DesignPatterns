<?php

/**
 * Terminal expression for specific validation
 *
 * AgeGreaterThanRule
 */
class AgeGreaterThanRule extends AbstractValidationRule implements ValidationRuleInterface
{

    public function execute(array $context): bool
    {
        return isset($context['age']) && $context['age'] > $this->ruleConfig['minAge'];
    }


}
