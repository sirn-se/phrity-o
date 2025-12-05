<?php

namespace Phrity\O\Array;

/**
 * Phrity\O\Array\IteratorTrait trait.
 */
trait IteratorTrait
{
    use TypeTrait;

    // Iterator interface implementation.

    /**
     * Return the current element.
     * @return mixed Current element.
     */
    public function current(): mixed
    {
        return current($this->{$this->o_source_ref});
    }

    /**
     * Return the key of the current element.
     * @return array-key Current key.
     */
    public function key(): mixed
    {
        return key($this->{$this->o_source_ref});
    }

    /**
     * Move forward to next element.
     */
    public function next(): void
    {
        next($this->{$this->o_source_ref});
    }

    /**
     * Rewind the Iterator to the first element.
     */
    public function rewind(): void
    {
        reset($this->{$this->o_source_ref});
    }

    /**
     * Checks if current position is valid.
     * @return bool True if valid.
     */
    public function valid(): bool
    {
        return array_key_exists(key($this->{$this->o_source_ref}), $this->{$this->o_source_ref});
    }


    // Iterator methods not in interface.

    /**
     * Move backward to previous element.
     * @return mixed Returns the value in the previous position.
     */
    public function previous(): mixed
    {
        return prev($this->{$this->o_source_ref});
    }

    /**
     * Advance the Iterator to the last element.
     * @return mixed Returns the value of the last element.
     */
    public function forward(): mixed
    {
        return end($this->{$this->o_source_ref});
    }
}
