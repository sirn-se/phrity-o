<?php

namespace Phrity\O\Object;

/**
 * Phrity\O\Object\TypeTrait trait.
 */
trait TypeTrait
{
    protected object $o_object_source;
    protected string $o_source_ref = 'o_object_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param object $value Initial value.
     */
    protected function initialize(object $value = null): void
    {
        if (!isset($this->{$this->o_source_ref})) {
            $this->{$this->o_source_ref} = $value ?: (object)[];
        }
    }
}
