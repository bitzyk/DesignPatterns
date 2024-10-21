<?php

class ExpressionBuilder
{
    private const array NON_TERMINAL = [
        'and' => AndRule::class,
        'or' => OrRule::class,
        'not' => NotRule::class
    ];

    public function build($config): ValidationRuleInterface {
        $key = key($config);

        if ($this->isNonTerminal($key)) {
            return $this->buildNonTerminal($key, $config[$key]);
        } else {
            return $this->buildTerminal($config[$key]);
        }
    }

    private function buildNonTerminal(
        string $key,
        $config,
    ): ValidationRuleInterface
    {
        if (in_array($key, ['or', 'and'])) {
            return $this->buildAndOrOr($key, $config);
        }

        if ($key === 'not') {
            // not will have as a single child a terminal or non-terminal expression
            return $this->buildNot($key, $config);
        }

        throw new \InvalidArgumentException("Invalid non-terminal expression: $key");
    }

    private function buildAndOrOr(
        string $key,
        $config,
    ): ValidationRuleInterface
    {
        $keyLeft = key($config);
        $configLeft = $config[$keyLeft];
        unset($config[$keyLeft]);

        $keyRight = key($config);
        $configRight = $config[$keyRight];
        unset($config[$keyRight]);

        $leftNode = $this->isNonTerminal($keyLeft)
            ? $this->buildNonTerminal($keyLeft, $configLeft)
            : $this->buildTerminal($configLeft);

        $rightNode = $this->isNonTerminal($keyRight)
            ? $this->buildNonTerminal($keyRight, $configRight)
            : $this->buildTerminal($configRight);

        return new (self::NON_TERMINAL[$key])(
            $leftNode,
            $rightNode
        );
    }

    private function buildNot(
        string $key,
               $config,
    ): ValidationRuleInterface
    {
        $keyNot = key($config);
        $configNot = $config[$keyNot];
        unset($config[$keyNot]);

        $notNode = $this->isNonTerminal($keyNot)
            ? $this->buildNonTerminal($keyNot, $configNot)
            : $this->buildTerminal($configNot);

        return new (self::NON_TERMINAL[$key])(
            $notNode
        );
    }


    private function buildTerminal(array $config): ValidationRuleInterface
    {
        return new ($config['rule'])($config['ruleConfig']);
    }

    private function isNonTerminal(
        $key,
    ): bool
    {
        if (in_array($key, ['and', 'or', 'not'])) {
            return true;
        }

        return false;
    }

}
