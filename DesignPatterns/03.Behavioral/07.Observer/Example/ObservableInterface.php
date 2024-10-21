<?php

interface ObservableInterface
{
    public function attach(ObserverInterface $observer): self;

    public function detach(ObserverInterface $observer): void;

    public function notify(string $action): void;
}
