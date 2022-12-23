<?php

/**
 * File for O\Array\QueueIteratorTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Array;

use Traversable;

/**
 * O\Array\QueueIteratorTrait trait.
 */
trait QueueIteratorTrait
{
    protected array $o_array_source = [];
    protected string $o_source_ref = 'o_array_source';


    // IteratorAggregate interface implementation

    /**
     * Consume array (FIFO) and yield key/value pair.
     * @return Traversable The iterator function.
     */
    public function getIterator(): Traversable
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