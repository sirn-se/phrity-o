<?php

namespace Phrity\O\Array;

/**
 * Phrity\O\Array\StringableTrait trait.
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
        $count = count($this->{$this->o_source_ref});
        $class = explode('\\', self::class);
        $class = array_pop($class);
        return "{$class}({$count})";
    }
}
