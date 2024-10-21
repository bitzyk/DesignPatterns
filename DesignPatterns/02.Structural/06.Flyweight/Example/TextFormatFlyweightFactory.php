<?php

/**
 * Manages the creation of these Flyweight objects and ensures they are reused rather than duplicated.
 *
 * We implement the factory which caches the flyweight objects & provide methods to get them
 *
 * It maintains the intrinsic state of the flyweight object - i.e. the shared state
 */
class TextFormatFlyweightFactory
{

    private array $sharedTextFormats = [];


    public function getSharedTextFormat(
        string $font,
        int $size,
        string $color
    ): TextFormatFlyweightInterface
    {
        $key = $font . $size . $color;

        if (! isset($this->sharedTextFormats[$key])) {
            // we create a new object only if it doesn't exist
            // by doing this, we save memory
            // we will not create for the same font, size, and color the same object
            $this->sharedTextFormats[$key] = new SharedTextFormat($font, $size, $color);
        }

        return $this->sharedTextFormats[$key];

    }
}
