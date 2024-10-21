<?php

require_once __DIR__ . '/FilterHandlerInterface.php';
require_once __DIR__ . '/AbstractFilterHandler.php';
require_once __DIR__ . '/Filter/SpamSourceFilter.php';
require_once __DIR__ . '/Filter/SpamKeywordsFilter.php';
require_once __DIR__ . '/Filter/AttachmentFilter.php';
require_once __DIR__ . '/Entity/Email.php';


class Client {

    /**
     * First handler in the chain
     */
    private FilterHandlerInterface $firstFilter;

    public function __construct() {

        // instantiate the email filters
        $spamSourceFilter = new SpamSourceFilter();
        $spamKeywordsFilter = new SpamKeywordsFilter();
        $attachmentFilter = new AttachmentFilter();


        // we chain the discount handlers
        $spamSourceFilter->setNext($spamKeywordsFilter);
        $spamKeywordsFilter->setNext($attachmentFilter);


        // set the first handler in the chain
        $this->firstFilter = $spamSourceFilter;
    }

    public function sendEmail(Email $email): void
    {
        if ($this->firstFilter->filter($email)) {
            echo "Email is valid\n";
        } else {
            echo "Email is spam\n";
        }
    }
}

$email = new Email(
    from: 'spam.com',
    to: 'ioana@gmail.com',
    subject: 'Test subject',
    body: 'Test body viagra',
    attachment: 'clean attachment'
);

$client = new Client();

$client->sendEmail($email);

