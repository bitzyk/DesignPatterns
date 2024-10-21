<?php


class SpamKeywordsFilter extends AbstractFilterHandler implements FilterHandlerInterface
{

    private const array SPAM_KEYWORDS = [
        'spam',
        'viagra',
        'buy now',
        'discount',
        'offer',
        'free',
        'money',
        'limited',
        'time',
        'urgent',
    ];

    protected function isMalicious(Email $email): bool
    {
        $emailBody = $email->getBody();

        foreach (self::SPAM_KEYWORDS as $keyword) {
            if (str_contains($emailBody, $keyword)) {
                return true;
            }
        }

        return false;
    }

    protected function getFilterName(): string
    {
        return 'SpamKeywordsFilter';
    }

}
