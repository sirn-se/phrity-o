<?php

/**
 * File for O\Object\StringableTrait trait.
 * @package Phrity > O.
 */

namespace Phrity\O\Object;

/**
 * O\Object\StringableTrait trait.
 */
trait StringableTrait
{
    protected object $o_object_source;
    protected string $o_source_ref = 'o_object_source';


    // Stringable interface implementation

    /**
     * Return string representation.
     * @return string.
     */
    public function __toString(): string
    {
        return self::class;
    }
}
