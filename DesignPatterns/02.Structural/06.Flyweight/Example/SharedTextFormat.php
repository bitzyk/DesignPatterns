<?php

/**
 * This class is responsible for shared properties like font, size, and color.
 *
 * In implementation of shared flyweight object, we add the intrinsic state & also implement the methods
 *
 * The intrinsic state is the properties that are shared across multiple objects.
 *
 * In our case, the intrinsic state is the format, size, and color.
 * There is no reason to have multiple instances of the same format, size, and color for each character - this will lead to a lot of memory usage.
 */
class SharedTextFormat implements TextFormatFlyweightInterface
{

    public function __construct(
        private readonly string $font,
        private readonly int $size,
        private readonly string $color
    )
    {

    }
    public function render(string $chrs): string
    {
        return sprintf(
            "[chrs \"%s\" with font %s, size %d, and color %s]",
            $chrs,
            $this->font,
            $this->size,
            $this->color
        );
    }
}
