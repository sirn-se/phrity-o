<?php

namespace Phrity\O\Object;

/**
 * O\Object\StringableTrait trait.
 */
trait StringableTrait
{
    use TypeTrait;

    // Stringable interface implementation.

    /**
     * Return string representation.
     * @return string String representation.
     */
    public function __toString(): string
    {
        return self::class;
    }
}
