<?php

require_once __DIR__ . '/Expression/ValidationRuleInterface.php';
require_once __DIR__ . '/Expression/AbstractValidationRule.php';
/* non-terminal expression */
require_once __DIR__ . '/Expression/NonTerminal/AndRule.php';
require_once __DIR__ . '/Expression/NonTerminal/OrRule.php';
require_once __DIR__ . '/Expression/NonTerminal/NotRule.php';

/* terminal expression */
require_once __DIR__ . '/Expression/Terminal/AgeGreaterThanRule.php';
require_once __DIR__ . '/Expression/Terminal/CountryIsRule.php';
require_once __DIR__ . '/Expression/Terminal/EmailValidRule.php';
require_once __DIR__ . '/Expression/Terminal/IsAdminRule.php';

require_once __DIR__ . '/Expression/ExpressionBuilder.php';


$config = [
    'and' => [
        [
            'rule' => AgeGreaterThanRule::class,
            'ruleConfig' => [
                'minAge' => 18,
            ],
        ],
        'not' => [
            'and' => [
                [
                    'rule' => CountryIsRule::class,
                    'ruleConfig' => [
                        'countryCode' => 'RO',
                    ],
                ],
                [
                    'rule' => IsAdminRule::class,
                    'ruleConfig' => [],
                ],
            ],
        ],
    ],
];

/*
 *
## Example


#### Problem Overview

We need to evaluate complex validation rules for user data in different contexts.
The rules can be combined using logical operators like AND, OR, and NOT.
The Interpreter design pattern helps us define a grammar for these rules and provides an interpreter to evaluate them.

#### Components

* ValidationRuleInterface: Defines the interface for all validation rules.
* AbstractValidationRule: An abstract class that implements common functionality for validation rules.
* Terminal Expressions: Concrete classes that represent the simplest rules.
* Non-Terminal Expressions: Concrete classes that represent logical combinations of rules.
* ExpressionBuilder: A class that builds the abstract syntax tree (AST) from a configuration array.
* ValidationRuleInterface: Defines the method that all validation rules must implement

This example demonstrates how the Interpreter design pattern can be used to evaluate complex validation rules in different contexts.
The ExpressionBuilder class simplifies the creation of the abstract syntax tree (AST) from a configuration array, making it easier to manage and extend the rules.
 */



$expressionBuilder = new ExpressionBuilder();

$finalValidRule = $expressionBuilder->build($config);


$context = [
    'age' => 22,
    'countryCode' => 'RO',
    'email' => 'cristi.bitoi@gmail.com',
    'userRole' => 'admin',
];

var_dump($finalValidRule->execute($context));
