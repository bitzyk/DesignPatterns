<?php

class SpamSourceFilter extends AbstractFilterHandler implements FilterHandlerInterface
{

    private const array SPAM_SOURCES = [
        'spam.com',
        'spam.org',
        'spam.net',
    ];

    protected function isMalicious(Email $email): bool
    {
        return in_array($email->getFrom(), self::SPAM_SOURCES);
    }

    protected function getFilterName(): string
    {
        return 'SpamSourceFilter';
    }

}
