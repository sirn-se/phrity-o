<?php

namespace Phrity\O\Array;

use Traversable;

/**
 * Phrity\O\Array\StackTrait trait.
 */
trait StackTrait
{
    use TypeTrait;

    /**
     * Add item to the top of stack.
     * @param mixed $item Item to add.
     */
    public function push(mixed $item): void
    {
        array_push($this->{$this->o_source_ref}, $item);
        $this->{$this->o_source_ref} = array_values($this->{$this->o_source_ref});
    }

    /**
     * Retrieve item from stack.
     * @return mixed $item Get and remove top item in stack.
     */
    public function pop(): mixed
    {
        return array_pop($this->{$this->o_source_ref});
    }
}
