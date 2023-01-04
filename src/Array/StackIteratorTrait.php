<?php

namespace Phrity\O\Array;

use Generator;

/**
 * Phrity\O\Array\StackIteratorTrait trait.
 */
trait StackIteratorTrait
{
    use TypeTrait;

    // IteratorAggregate interface implementation.

    /**
     * Consume array (LIFO) and yield key/value pair.
     * @return Generator The iterator function.
     */
    public function getIterator(): Generator
    {
        return (function () {
            while (!empty($this->{$this->o_source_ref})) {
                $value = end($this->{$this->o_source_ref});
                $key = key($this->{$this->o_source_ref});
                unset($this->{$this->o_source_ref}[$key]);
                yield $key => $value;
            }
        })();
    }
}
