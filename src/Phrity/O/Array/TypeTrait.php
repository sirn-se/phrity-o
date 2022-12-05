<?php

/**
 * File for O\Array\TypeTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Array;

/**
 * O\Array\TypeTrait trait.
 */
trait TypeTrait implements TypeInterface
{
    private array $array_data = [];

    public function getContent(): array
    {
        return $this->array_data;
    }

    public function setContent(array $array_data): void
    {
        $this->array_data = $array_data;
    }
}
