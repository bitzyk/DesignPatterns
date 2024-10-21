<?php

/**
 * Non-Terminal expression for specific validation
 *
 * AND operator: both rules must be true
 */
class AndRule implements ValidationRuleInterface
{
    public function __construct(
        private readonly ValidationRuleInterface $rule1,
        private readonly ValidationRuleInterface $rule2
    ) {
    }

    public function execute(array $context): bool
    {
        return $this->rule1->execute($context) && $this->rule2->execute($context);
    }

}
