<?php

namespace Phrity\O\Boolean;

/**
 * Phrity\O\Boolean\TypeTrait trait.
 */
trait TypeTrait
{
    protected bool $o_boolean_source;
    protected string $o_source_ref = 'o_boolean_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param bool $value Initial value.
     */
    protected function initialize(bool $value = false): void
    {
        if (!isset($this->{$this->o_source_ref})) {
            $this->{$this->o_source_ref} = $value;
        }
    }
}
