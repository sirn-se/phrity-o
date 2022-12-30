<?php

/**
 * File for O\Boolean\StringableTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Boolean;

/**
 * O\Boolean\StringableTrait trait.
 */
trait StringableTrait
{
    protected bool $o_boolean_source = false;
    protected string $o_source_ref = 'o_boolean_source';


    // Stringable interface implementation

    /**
     * Return string representation
     * @return string
     */
    public function __toString(): string
    {
        return $this->{$this->o_source_ref} ? 'true' : 'false';
    }
}
