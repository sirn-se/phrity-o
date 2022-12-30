<?php

/**
 * File for O\String\StringableTrait trait.
 * @package Phrity > O.
 */

namespace Phrity\O\String;

/**
 * O\String\StringableTrait trait.
 */
trait StringableTrait
{
    protected string $o_string_source = '';
    protected string $o_source_ref = 'o_string_source';


    // Stringable interface implementation

    /**
     * Return string representation.
     * @return string.
     */
    public function __toString(): string
    {
        return $this->{$this->o_source_ref};
    }
}
