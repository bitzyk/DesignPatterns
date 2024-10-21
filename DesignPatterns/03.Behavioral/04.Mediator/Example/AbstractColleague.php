<?php

abstract class AbstractColleague
{
    protected MediatorInterface $mediator;

    public function setMediator(
        MediatorInterface $mediator
    ): self
    {
        $this->mediator = $mediator;

        return $this;
    }
}
