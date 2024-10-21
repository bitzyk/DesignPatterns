<?php

abstract class AbstractObserver implements ObserverInterface
{
    protected abstract function doUpdate(ObservableInterface $subject): void;

    protected abstract function getExpectedAction(): string;

    protected abstract function getExpectedSubject(): string;

    public function update(
        string $action,
        ObservableInterface $subject
    ): void
    {
        $this->validateExpectedTarget($subject);

        if ($action === $this->getExpectedAction()) {
            $this->doUpdate($subject);
        }
    }

    private function validateExpectedTarget(
        ObservableInterface $subject
    ): void
    {
        if (
            $this->getExpectedSubject() !== get_class($subject)
        ) {
            throw new \InvalidArgumentException(
                'Invalid subject'
            );
        }
    }

}
