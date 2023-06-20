<?php

namespace Phrity\O\Object;

use Generator;

/**
 * Phrity\O\Object\IteratorAggregateTrait trait.
 */
trait IteratorAggregateTrait
{
    use TypeTrait;

    // IteratorAggregate interface implementation.

    /**
     * Iterate object properties and yield key/value pair.
     * @return Generator The iterator function.
     */
    public function getIterator(): Generator
    {
        return (function () {
            foreach (get_object_vars($this->{$this->o_source_ref}) as $key => $value) {
                yield $key => $value;
            }
        })();
    }
}
