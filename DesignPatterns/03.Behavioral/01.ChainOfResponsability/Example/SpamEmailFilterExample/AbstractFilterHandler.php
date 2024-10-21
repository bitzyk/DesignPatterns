<?php

abstract class AbstractFilterHandler implements FilterHandlerInterface
{
    private FilterHandlerInterface|null $nextHandler = null;

    public function setNext(FilterHandlerInterface $handler): FilterHandlerInterface
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function filter(Email $email): bool
    {
        if ($this->isMalicious($email)) {
            echo sprintf('Email from %s has been blocked by %s', $email->getFrom(), $this->getFilterName()) . PHP_EOL;
            return false;
        }

        return $this->handleNext($email);
    }

    abstract protected function isMalicious(Email $email): bool;

    protected function handleNext(Email $email): bool
    {
        if ($this->nextHandler) {
            return $this->nextHandler->filter($email);
        }

        return true; // No more handlers - all passed -> we can send the email
    }

    abstract protected function getFilterName(): string;

}
