<?php

namespace Phrity\O\Array;

/**
 * Phrity\O\Array\CountableTrait trait.
 */
trait CountableTrait
{
    use TypeTrait;

    // Countable interface implementation.

    /**
     * Count elements of an object.
     * @return int Number of elements.
     */
    public function count(): int
    {
        return count($this->{$this->o_source_ref});
    }
}
