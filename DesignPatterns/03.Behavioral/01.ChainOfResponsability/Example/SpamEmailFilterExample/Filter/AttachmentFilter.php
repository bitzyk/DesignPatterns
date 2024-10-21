<?php

class AttachmentFilter extends AbstractFilterHandler implements FilterHandlerInterface
{

    protected function isMalicious(Email $email): bool
    {
        // check attachment content for malicious code
        return str_contains($email->getAttachment(), 'malicious code');
    }

    protected function getFilterName(): string
    {
        return 'AttachmentFilter';
    }

}
