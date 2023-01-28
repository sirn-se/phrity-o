<?php

namespace Phrity\O\Array;

use Generator;

/**
 * Phrity\O\Array\QueueIteratorTrait trait.
 */
trait QueueIteratorTrait
{
    use TypeTrait;

    // IteratorAggregate interface implementation.

    /**
     * Consume array (FIFO) and yield key/value pair.
     * @return Generator The iterator function.
     */
    public function getIterator(): Generator
    {
        return (function () {
            while (!empty($this->{$this->o_source_ref})) {
                $key = key($this->{$this->o_source_ref});
                $value = array_shift($this->{$this->o_source_ref});
                yield $key => $value;
            }
        })();
    }
}
