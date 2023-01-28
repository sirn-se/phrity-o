<?php

namespace Phrity\O\Number;

/**
 * Phrity\O\Number\TypeTrait trait.
 */
trait TypeTrait
{
    protected float $o_float_source;
    protected string $o_source_ref = 'o_float_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param float $value Initial value.
     */
    protected function initialize(float $value = 0.0): void
    {
        if (!isset($this->{$this->o_source_ref})) {
            $this->{$this->o_source_ref} = $value;
        }
    }
}
