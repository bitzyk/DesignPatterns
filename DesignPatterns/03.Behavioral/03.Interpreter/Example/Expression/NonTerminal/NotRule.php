<?php

/**
 * Non-Terminal expression for specific validation
 *
 * NOT operator: the rule must be false
 */
class NotRule implements ValidationRuleInterface
{
    public function __construct(
        private readonly ValidationRuleInterface $rule,
    ) {
    }

    public function execute(array $context): bool
    {
        return ! $this->rule->execute($context);
    }

}
