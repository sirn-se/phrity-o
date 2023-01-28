<?php

namespace Phrity\O\Boolean;

/**
 * Phrity\O\Boolean\StringableTrait trait.
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
        return $this->{$this->o_source_ref} ? 'true' : 'false';
    }
}
