<?php

/**
 * This is the originator class
 *
 * This is the class whose state we want to save and restore.
 *
 */
class Document
{
    public function __construct(
        private string $content = ""
    ) {
    }

    /**
     * Change the content of the document
     */
    public function write(string $text):self {
        $this->content .= $text;

        return $this;
    }

    /**
     * Create a memento (snapshot) of the current state
     */
    public function save(): DocumentMemento {
        return new DocumentMemento($this->content);
    }

    /**
     * Restore the content from the memento
     */
    public function restore(DocumentMemento $memento): void {
        $this->content = $memento->getContent();
    }

    /**
     * Display the document content
     */
    public function getContent(): string {
        return $this->content;
    }
}
