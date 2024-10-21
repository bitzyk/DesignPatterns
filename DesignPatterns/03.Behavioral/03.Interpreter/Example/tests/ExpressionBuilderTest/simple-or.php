<?php

require_once __DIR__ . '/../../Expression/ValidationRuleInterface.php';
require_once __DIR__ . '/../../Expression/AbstractValidationRule.php';
/* non-terminal expression */
require_once __DIR__ . '/../../Expression/NonTerminal/AndRule.php';
require_once __DIR__ . '/../../Expression/NonTerminal/OrRule.php';
require_once __DIR__ . '/../../Expression/NonTerminal/NotRule.php';

/* terminal expression */
require_once __DIR__ . '/../../Expression/Terminal/AgeGreaterThanRule.php';
require_once __DIR__ . '/../../Expression/Terminal/CountryIsRule.php';
require_once __DIR__ . '/../../Expression/Terminal/EmailValidRule.php';
require_once __DIR__ . '/../../Expression/Terminal/IsAdminRule.php';

require_once __DIR__ . '/../../Expression/ExpressionBuilder.php';

$config = [
    'or' => [
        [
            'rule' => EmailValidRule::class,
            'ruleConfig' => [],
        ],
        [
            'rule' => IsAdminRule::class,
            'ruleConfig' => [],
        ],
    ]
];


$expressionBuilder = new ExpressionBuilder();

$finalValidRule = $expressionBuilder->build($config);

$context = [
    'age' => 16,
    'countryCode' => 'GB',
    'email' => 'xxx', // admin is allowed to have invalid email
    'userRole' => 'admin',
];

assert($finalValidRule->execute($context) === true);

$context = [
    'age' => 22,
    'countryCode' => 'GB',
    'email' => 'cristi.bitoi@gmail.com', // user is not allowed to have invalid email
    'userRole' => 'user',
];

assert($finalValidRule->execute($context) === true);

$context = [
    'age' => 22,
    'countryCode' => 'RO',
    'email' => 'xxx',
    'userRole' => 'user',
];

assert($finalValidRule->execute($context) === false);


