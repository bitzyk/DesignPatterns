<?php

/**
 * This class is responsible for unshared properties like decoration.
 *
 * In implementation of unshared flyweight object, we add the extrinsic state & also implement the methods
 *
 * The extrinsic state is the properties that are not shared across multiple objects.
 *
 * In our case, the extrinsic state is the decoration.
 * We cannot share the decoration between multiple characters because each character may have a different decoration.
 */
class DecorationTextFormat implements TextFormatFlyweightInterface
{
    /**
     * We pass the shared flyweight object as a dependency because we need to render the shared properties.
     */
    public function __construct(
        private readonly string $decoration, // e.g., "bold", "italic", "underline"
        private readonly TextFormatFlyweightInterface $sharedTextFormat
    )
    {

    }
    public function render(string $chrs): string
    {
        return sprintf(
            "[chrs \"%s\" with decoration %s]",
            $this->sharedTextFormat->render($chrs),
            $this->decoration
        );
    }
}
