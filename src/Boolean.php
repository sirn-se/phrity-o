<?php

/**
 * File for O\Boolean class.
 * @package Phrity > O
 */

namespace Phrity\O;

use InvalidArgumentException;
use Stringable;
use Phrity\Comparison\Comparable;
use Phrity\O\Boolean\{
    ComparableTrait,
    InvokableTrait,
    StringableTrait
};

/**
 * O\Boolean class.
 */
class Boolean implements Comparable, Stringable
{
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    /**
     * Constructor for O\Boolean
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new InvalidArgumentException('Unsupported argument for O\Boolean');
        }
    }

    // Protected internal methods

    /**
     * Bind provided data to internal structure
     * @param  mixed $content Input data
     * @return bool           The internal structure
     */
    protected function bind(mixed $content): bool
    {
        if (is_bool($content)) {
            return $this->o_boolean_source = $content;
        }
        if ($content instanceof self) {
            return $this->o_boolean_source = $content->o_boolean_source;
        }
        if (is_scalar($content) || is_null($content)) {
            return $this->o_boolean_source = $content == 1;
        }
        throw new InvalidArgumentException('Unsupported input data for O\Boolean');
    }
}
