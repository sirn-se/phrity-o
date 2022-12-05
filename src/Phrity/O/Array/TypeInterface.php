<?php

/**
 * File for O\Array\TypeInterface interface.
 * @package Phrity > O
 */

namespace Phrity\O\Array;

/**
 * O\Array\TypeInterface interface.
 */
interface TypeInterface
{
    public function getContent(): array;

    public function setContent(array $array_data): void;
}
