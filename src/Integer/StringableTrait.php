<?php

namespace Phrity\O\Integer;

/**
 * Phrity\O\Integer\StringableTrait trait.
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
        return (string)$this->{$this->o_source_ref};
    }
}
