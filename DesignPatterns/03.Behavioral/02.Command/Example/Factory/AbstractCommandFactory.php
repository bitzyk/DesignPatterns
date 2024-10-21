<?php

abstract class AbstractCommandFactory
{
    abstract public function createCommand(array $context): CommandInterface;
}
