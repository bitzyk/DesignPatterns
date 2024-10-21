<?php

/**
 * Memento class for Document
 *
 * This class stores the state of the document. It’s immutable, meaning the content can't be modified once saved.
 */
class DocumentMemento
{

    public function __construct(
        private string $content
    ) {
    }

    /**
     * Provide access to the saved content
     */
    public function getContent(): string {
        return $this->content;
    }
}
