<?php

/**
 * Both shared and unshared flyweights will implement this interface.
 *
 * We start by identifying the intrinsic and extrinsic state of the object
 * In our case this is the render method.
 *
 * All flyweights need to render themselves.
 */
interface TextFormatFlyweightInterface
{

    public function render(string $chrs): string;
}
