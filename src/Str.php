<?php

/**
 * File for O\Str class.
 * @package Phrity > O
 */

namespace Phrity\O;

use InvalidArgumentException;
use Stringable;
use Phrity\Comparison\Comparable;
use Phrity\O\String\{
    ComparableTrait,
    InvokableTrait,
    StringableTrait
};

/**
 * O\Str class.
 */
class Str implements Comparable, Stringable
{
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    /**
     * Constructor for O\Str
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new InvalidArgumentException('Unsupported argument for O\Str');
        }
    }


    // Protected internal methods

    /**
     * Bind provided data to internal structure
     * @param  mixed $content Input data
     * @return array          The internal structure
     */
    protected function bind(mixed $content): string
    {
        if (is_scalar($content)) {
            return $this->o_string_source = (string)$content;
        }
        if (is_null($content)) {
            return $this->o_string_source = '';
        }
        if ($content instanceof self) {
            return $this->o_string_source = $content->o_string_source;
        }
        if (is_object($content) && method_exists($content, '__toString')) {
            return $this->o_string_source = "{$content}";
        }
        throw new InvalidArgumentException('Unsupported input data for O\Str');
    }
}
