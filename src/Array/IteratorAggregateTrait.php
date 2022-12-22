<?php

/**
 * File for O\Array\IteratorAggregateTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Array;

use Traversable;

/**
 * O\Array\IteratorAggregateTrait trait.
 */
trait IteratorAggregateTrait
{
    protected array $o_array_source = [];
    protected string $o_source_ref = 'o_array_source';


    // IteratorAggregate interface implementation

    /**
     * Iterate array and yield key/value pair.
     * @return Traversable The iterator function.
     */
    public function getIterator(): Traversable
    {
        return (function () {
            foreach ($this->{$this->o_source_ref} as $key => $value) {
                yield $key => $value;
            }
        })();
    }
}
