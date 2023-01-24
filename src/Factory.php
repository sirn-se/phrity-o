<?php

namespace Phrity\O;

use RuntimeException;

/**
 * Phrity\O\Factory class.
 */
class Factory
{
    /**
     * Conversion method; any input is converted into an "O" instance.
     * @param mixed $source The input to convert.
     * @param bool $recursive If arrays and objects should convert recursivily.
     * @return object The resulting "O" instance.
     */
    public function convert(mixed $source, bool $recursive = false): object
    {
        if ($source instanceof SourceInterface) {
            return $source; // Don't re-convert "O" classes.
        }

        $type = gettype($source);
        switch ($type) {
            case 'array':
                if ($recursive) {
                    $this->arrayRecursion($source);
                }
                return new Arr($source);
            case 'boolean':
                return new Boolean($source);
            case 'integer':
                return new Integer($source);
            case 'double':
                return new Number($source);
            case 'object':
                if ($recursive) {
                    $this->objectRecursion($source);
                }
                return new Obj($source);
            case 'string':
                return new Str($source);
        }
        throw new RuntimeException("Unsupported type '{$type}'.");
    }

    /**
     * Recursion handler for arrays.
     * @param array $source The input to apply recursion to.
     */
    private function arrayRecursion(array $source): void
    {
        array_map(function ($item) {
            return $this->convert($item, true);
        }, $source);
    }

    /**
     * Recursion handler for objects.
     * @param object $source The input to apply recursion to.
     */
    private function objectRecursion(object $source): void
    {
        array_map(function ($item) {
            return $this->convert($item, true);
        }, get_object_vars($source));
    }
}
