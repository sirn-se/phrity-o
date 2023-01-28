<?php

namespace Phrity\O\Array;

/**
 * Phrity\O\Array\ArrayAccessTrait trait.
 */
trait ArrayAccessTrait
{
    use TypeTrait;

    // ArrayAccess interface implementation.

    /**
     * Whether an offset exists.
     * @param  mixed $offset An offset to check for.
     * @return True if offset exist.
     */
    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->{$this->o_source_ref});
    }

    /**
     * Returns the value at specified offset.
     * @param  mixed $offset The offset to retrieve.
     * @return mixed Value for offset.
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->{$this->o_source_ref}[$offset];
    }

    /**
     * Assigns a value to the specified offset.
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->{$this->o_source_ref}[] = $value;
        } else {
            $this->{$this->o_source_ref}[$offset] = $value;
        }
    }

    /**
     * Unsets an offset.
     * @param mixed $offset The offset to unset.
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->{$this->o_source_ref}[$offset]);
    }
}
