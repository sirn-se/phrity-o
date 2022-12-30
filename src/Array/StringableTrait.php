<?php

/**
 * File for O\Array\StringableTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Array;

/**
 * O\Array\StringableTrait trait.
 */
trait StringableTrait
{
    protected array $o_array_source = [];
    protected string $o_source_ref = 'o_array_source';


    // Stringable interface implementation

    /**
     * Return string representation
     * @return string
     */
    public function __toString(): string
    {
        $count = count($this->{$this->o_source_ref});
        $class = explode('\\', self::class);
        $class = array_pop($class);
        return "{$class}({$count})";
    }
}
