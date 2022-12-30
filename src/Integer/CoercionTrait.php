<?php

/**
 * File for O\Integer\CoercionTrait trait.
 * @package Phrity > O.
 */

namespace Phrity\O\Integer;

use TypeError;

/**
 * O\Integer\CoercionTrait trait.
 */
trait CoercionTrait
{
    use TypeTrait;

    protected function coerce(mixed $content): int
    {
        if (is_int($content)) {
            return $content;
        }
        if (!$this->o_option_coerce) {
            throw new TypeError('Input must be of type int.');
        }
        if (is_null($content)) {
            return 0;
        }
        if ($content instanceof self) {
            return $content->{$content->o_source_ref};
        }
        if (is_numeric($content)) {
            $int_content = (int)$content;
            if ($int_content == $content) {
                return $int_content;
            }
        }
        throw new TypeError('Input must be usable as type int.');
    }
}
