<?php

namespace Phrity\O\String;

use TypeError;

/**
 * Phrity\O\String\CoercionTrait trait.
 */
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return string Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): string
    {
        if (is_string($value)) {
            return $value;
        }
        if (!$this->o_option_coerce) {
            throw new TypeError('Input must be of type string.');
        }
        if ($value instanceof self) {
            return $value->{$value->o_source_ref};
        }
        if (is_null($value)) {
            return '';
        }
        if (is_scalar($value)) {
            return (string)$value;
        }
        if (is_object($value) && method_exists($value, '__toString')) {
            return (string)$value;
        }
        throw new TypeError('Input must be usable as type string.');
    }
}
