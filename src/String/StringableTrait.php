<?php

namespace Phrity\O\String;

/**
 * Phrity\O\String\StringableTrait trait.
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
        return $this->{$this->o_source_ref};
    }
}
