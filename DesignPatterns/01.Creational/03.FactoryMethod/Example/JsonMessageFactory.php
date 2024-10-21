<?php

class JsonMessageFactory extends AbstractMessageFactory
{
    public function createMessage(): MessageInterface
    {
        return new JsonMessage();
    }
}
