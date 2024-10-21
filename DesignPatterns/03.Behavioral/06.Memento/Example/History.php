<?php

/**
 * Caretaker class
 *
 * This class manages the saved states (mementos). In this case, it's like an undo manager that keeps track of all the document states.
 */
class History
{
    /**
     * @var DocumentMemento[]
     */
    private array $mementos = [];

    /**
     * Save the memento
     */
    public function save(DocumentMemento $memento):void {
        $this->mementos[] = $memento;
    }

    /**
     * Restore the last saved memento
     */
    public function undo(Document $document): void {

        if (empty($this->mementos)) {
            $this->restore(
                $document, // the originator i.e. Document
                new DocumentMemento("") // empty memento
            );
            return;
        }

        $this->restore(
            $document, // the originator i.e. Document
            array_pop($this->mementos) // the last memento
        );
    }

    private function restore(
        Document $document,
        DocumentMemento $memento
    ): void
    {
        $document->restore($memento);
    }
}
