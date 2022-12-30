<?php

/**
 * File for O\Integer\StringableTrait trait.
 * @package Phrity > O.
 */

namespace Phrity\O\Integer;

/**
 * O\Integer\StringableTrait trait.
 */
trait StringableTrait
{
    protected int $o_integer_source = 0;
    protected string $o_source_ref = 'o_integer_source';


    // Stringable interface implementation

    /**
     * Return string representation.
     * @return string.
     */
    public function __toString(): string
    {
        return (string)$this->{$this->o_source_ref};
    }
}
