<?php

namespace Phrity\O\Integer;

/**
 * Phrity\O\Integer\TypeTrait trait.
 */
trait TypeTrait
{
    protected int $o_integer_source;
    protected string $o_source_ref = 'o_integer_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param int $value Initial value.
     */
    protected function initialize(int $value = 0): void
    {
        if (!isset($this->{$this->o_source_ref})) {
            $this->{$this->o_source_ref} = $value;
        }
    }
}
