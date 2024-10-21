<?php

abstract class AbstractObservable implements ObservableInterface
{

    /**
     * @var ObserverInterface[]
     */
    private array $observers = [];

    public function attach(ObserverInterface $observer): self
    {
        $this->observers[spl_object_hash($observer)] = $observer;

        return $this;
    }

    public function detach(ObserverInterface $observer): void
    {
        $hash = spl_object_hash($observer);

        if (! isset($this->observers[$hash])) {
            return;
        }

        unset($this->observers[$hash]);
    }

    public function notify(
        string $action
    ): void
    {
        foreach ($this->observers as $observer) {
            $observer->update(
                $action,
                $this
            );
        }
    }

}
