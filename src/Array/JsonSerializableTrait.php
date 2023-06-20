<?php

namespace Phrity\O\Array;

/**
 * Phrity\O\Array\JsonSerializableTrait trait.
 */
trait JsonSerializableTrait
{
    use TypeTrait;

    // JsonSerializable interface implementation.

    /**
     * Return content for JSON serialization.
     * @return mixed Class serialization content.
     */
    public function jsonSerialize()
    {
        return $this->{$this->o_source_ref};
    }
}
