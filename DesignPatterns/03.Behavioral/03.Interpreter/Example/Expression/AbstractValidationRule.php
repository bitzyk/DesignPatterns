<?php

abstract class AbstractValidationRule implements ValidationRuleInterface
{
    public function __construct(
        protected readonly array $ruleConfig
    )
    {
    }


}
