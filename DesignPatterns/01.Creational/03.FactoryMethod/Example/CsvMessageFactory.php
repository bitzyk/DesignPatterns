<?php

class CsvMessageFactory extends AbstractMessageFactory
{
    public function createMessage(): MessageInterface
    {
        return new CsvMessage();
    }
}
