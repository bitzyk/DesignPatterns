<?php

class Playlist implements IteratorAggregate
{
    /**
     * @var Song[]
     */
    private array $songs = [];

    private ?ArrayIterator $internalIterator = null;

    /**
     * @param Song $song
     * @return $this
     */
    public function addSong(
        Song $song,
    ): self
    {
        $this->songs[] = $song;

        if ($this->internalIterator) {
            $this->refreshIterator();
        }

        return $this;
    }

    public function playCurrentSong(): void
    {
        if ($this->getInternalIterator()->valid()) {
            /** @var Song $song */
            $song = $this->getInternalIterator()->current();
            echo "Now playing: " . $song->getName() . " by " . $song->getArtist() . PHP_EOL;
        } else {
            echo "You are at the end of the playlist." . PHP_EOL;
        }
    }

    public function nextSong(): void
    {
        $this->getInternalIterator()->next();

        if ($this->getInternalIterator()->valid()) {
            $this->playCurrentSong();
        } else {
            echo "You are at the end of the playlist." . PHP_EOL;
        }
    }

    public function previousSong(): void
    {
        if ($this->getInternalIterator()->key() > 0) {
            $this->getInternalIterator()->seek(
                $this->getInternalIterator()->key() - 1
            );
            $this->playCurrentSong();
        } elseif ($this->getInternalIterator()->key() === 0) {
            echo "You are at the beginning of the playlist." . PHP_EOL;
        } else {
            // at the end of the playlist -> go to the last song
            $this->getInternalIterator()
                 ->seek(
                     $this->getInternalIterator()->count() - 1
                 )
            ;
            $this->playCurrentSong();
        }
    }

    private function refreshIterator(): void
    {
        $newIterator = new ArrayIterator($this->songs);
        $newIterator->seek(
            $this->getInternalIterator()->key()
        );

        $this->internalIterator = $newIterator;
    }

    private function getInternalIterator(): ArrayIterator
    {
        if ($this->internalIterator === null) {
            $this->internalIterator = new ArrayIterator($this->songs);
        }

        return $this->internalIterator;
    }


    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->songs);
    }

}
