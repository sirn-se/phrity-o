<?php

namespace Phrity\O\Array;

use Traversable;

/**
 * Phrity\O\Array\IteratorAggregateTrait trait.
 */
trait IteratorAggregateTrait
{
    use TypeTrait;

    // IteratorAggregate interface implementation.

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
