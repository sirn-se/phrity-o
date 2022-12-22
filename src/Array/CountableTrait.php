<?php

/**
 * File for O\Array\CountableTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Array;

/**
 * O\Array\CountableTrait trait.
 */
trait CountableTrait
{
    protected array $o_array_source = [];
    protected string $o_source_ref = 'o_array_source';


    // Countable interface implementation

    /**
     * Count elements of an object
     * @return int Number of elements
     */
    public function count(): int
    {
        return count($this->{$this->o_source_ref});
    }
}
