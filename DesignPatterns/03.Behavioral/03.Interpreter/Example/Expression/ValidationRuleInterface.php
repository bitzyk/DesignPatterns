<?php

interface ValidationRuleInterface
{
    public function execute(array $context): bool;
}
