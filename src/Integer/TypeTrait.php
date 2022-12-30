<?php

/**
 * File for O\Integer\TypeTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Integer;

/**
 * O\Integer\TypeTrait trait.
 */
trait TypeTrait
{
    protected int $o_integer_source;
    protected string $o_source_ref = 'o_integer_source';
    protected bool $o_option_coerce = false;

    protected function initialize(int $data = 0): void
    {
        $this->{$this->o_source_ref} = $data;
    }
}
