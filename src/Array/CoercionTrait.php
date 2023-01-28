<?php

namespace Phrity\O\Array;

use TypeError;

/**
 * Phrity\O\Array\CoercionTrait trait.
 */
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return array Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): array
    {
        if (is_array($value)) {
            return $value;
        }
        if (!$this->o_option_coerce) {
            throw new TypeError('Input must be of type array.');
        }
        if (is_null($value)) {
            return [];
        }
        if ($value instanceof self) {
            return $value->{$value->o_source_ref};
        }
        if (is_object($value)) {
            // Converts to associative array, only public properties of input object.
            return json_decode(json_encode($value), true);
        }
        throw new TypeError('Input must be usable as type array.');
    }
}
