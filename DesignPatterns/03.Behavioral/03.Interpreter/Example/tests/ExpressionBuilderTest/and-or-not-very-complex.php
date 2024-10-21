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

/**
 * This is a very complex expression that uses and, or and not
 * It is a complex expression that is hard to read and understand
 * We just want to demonstrate that we can build such complex expressions
 *
 * In real life, the need for such complex expressions is rare
 * Like in SQL, 2 or 3 joins are ok, but more interconnections are hard to read and understand and not really needed
 */
$config = [
    'or' => [
        'or' => [
            'and' => [
                [
                    'rule' => AgeGreaterThanRule::class,
                    'ruleConfig' => [
                        'minAge' => 18
                    ],
                ],
                [
                    'rule' => CountryIsRule::class,
                    'ruleConfig' => [
                        'countryCode' => 'RO',
                    ],
                ]
            ],
            'or' => [
                [
                    'rule' => AgeGreaterThanRule::class,
                    'ruleConfig' => [
                        'minAge' => 18
                    ],
                ],
                'and' => [
                    [
                        'rule' => CountryIsRule::class,
                        'ruleConfig' => [
                            'countryCode' => 'RO',
                        ],
                    ],
                    'or' => [
                        [
                            'rule' => EmailValidRule::class,
                            'ruleConfig' => [ ],
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
                    ]
                ]
            ]
        ],
        [
            'rule' => IsAdminRule::class,
            'ruleConfig' => [ ],
        ]
    ],
];


$expressionBuilder = new ExpressionBuilder();

$finalValidRule = $expressionBuilder->build($config);


$context = [
    'age' => 22,
    'countryCode' => 'GB',
    'email' => 'xxx',
    'userRole' => 'user',
];

assert($finalValidRule->execute($context) === true);



