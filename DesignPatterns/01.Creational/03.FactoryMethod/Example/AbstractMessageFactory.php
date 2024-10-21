<?php

abstract class AbstractMessageFactory
{
    public abstract function createMessage(): MessageInterface;
}
