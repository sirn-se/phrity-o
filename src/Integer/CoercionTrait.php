<?php

namespace Phrity\O\Integer;

use TypeError;

/**
 * Phrity\O\Integer\CoercionTrait trait.
 */
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return int Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): int
    {
        if (is_int($value)) {
            return $value;
        }
        if (!$this->o_option_coerce) {
            throw new TypeError('Input must be of type int.');
        }
        if (is_null($value)) {
            return 0;
        }
        if ($value instanceof self) {
            return $value->{$value->o_source_ref};
        }
        if (is_numeric($value)) {
            $int_value = (int)$value;
            if ($int_value == $value) {
                return $int_value;
            }
        }
        throw new TypeError('Input must be usable as type int.');
    }
}
