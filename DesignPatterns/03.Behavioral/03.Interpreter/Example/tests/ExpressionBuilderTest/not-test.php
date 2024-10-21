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

// complex not test
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


$expressionBuilder = new ExpressionBuilder();

$finalValidRule = $expressionBuilder->build($config);

$context = [
    'age' => 22,
    'countryCode' => 'RO',
    'email' => 'cristi.bitoi@gmail.com',
    'userRole' => 'admin',
];

assert($finalValidRule->execute($context) === false);



$config = [
    'and' => [
        [
            'rule' => AgeGreaterThanRule::class,
            'ruleConfig' => [
                'minAge' => 18,
            ],
        ],
        'not' => [
            [
                'rule' => CountryIsRule::class,
                'ruleConfig' => [
                    'countryCode' => 'RO',
                ],
            ]
        ],
    ],
];

$finalValidRule = $expressionBuilder->build($config);

$context = [
    'age' => 22,
    'countryCode' => 'GB',
    'email' => 'cristi.bitoi@gmail.com',
    'userRole' => 'admin',
];

assert($finalValidRule->execute($context) === true);


$context = [
    'age' => 22,
    'countryCode' => 'RO',
    'email' => 'cristi.bitoi@gmail.com',
    'userRole' => 'admin',
];

assert($finalValidRule->execute($context) === false);
