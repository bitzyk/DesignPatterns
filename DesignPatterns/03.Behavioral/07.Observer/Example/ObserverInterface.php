<?php

interface ObserverInterface
{
    public function update(
        string $action,
        ObservableInterface $subject
    ): void;
}
