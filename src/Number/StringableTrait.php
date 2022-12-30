<?php

/**
 * File for O\Number\StringableTrait trait.
 * @package Phrity > O.
 */

namespace Phrity\O\Number;

/**
 * O\Number\StringableTrait trait.
 */
trait StringableTrait
{
    protected float $o_number_source = 0.0;
    protected string $o_source_ref = 'o_number_source';


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
