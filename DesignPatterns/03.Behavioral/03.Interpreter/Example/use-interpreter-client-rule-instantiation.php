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

$ageGreaterThanRule = new AgeGreaterThanRule(
    [
        'minAge' => 18,
    ]
);
$countryIsRule = new CountryIsRule(
    [
        'countryCode' => 'RO',
    ]
);
$emailValidRule = new EmailValidRule([]); // no rule configuration needed
$isAdminRule = new IsAdminRule([]); // no rule configuration needed

$andRule = new AndRule($ageGreaterThanRule, $countryIsRule);

$orRule = new OrRule($andRule, $emailValidRule);

$finalValidRule = new OrRule($orRule, $isAdminRule);

$context = [
    'age' => 12,
    'countryCode' => 'RO',
    //'email' => 'cristi.bitoi@gmail.com',
    'userRole' => 'admin',
];

var_dump($finalValidRule->execute($context));
