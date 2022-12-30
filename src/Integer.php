<?php

/**
 * File for O\Integer class.
 * @package Phrity > O
 */

namespace Phrity\O;

use InvalidArgumentException;
use Stringable;
use Phrity\Comparison\Comparable;
use Phrity\O\Integer\{
    ComparableTrait,
    InvokableTrait,
    StringableTrait
};

/**
 * O\Integer class.
 */
class Integer implements Comparable, Stringable
{
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    /**
     * Constructor for O\Integer
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new InvalidArgumentException('Unsupported argument for O\Integer');
        }
    }

    // Protected internal methods

    /**
     * Bind provided data to internal structure
     * @param  mixed $content Input data
     * @return int            The internal structure
     */
    protected function bind(mixed $content): int
    {
        if (is_int($content)) {
            return $this->o_integer_source = $content;
        }
        if (is_null($content)) {
            return $this->o_integer_source = 0;
        }
        if (is_numeric($content)) {
            $int_content = (int)$content;
            if ($int_content == $content) {
                return $this->o_integer_source = $int_content;
            }
        }
        if ($content instanceof self) {
            return $this->o_integer_source = $content->o_integer_source;
        }
        throw new InvalidArgumentException('Unsupported input data for O\Integer');
    }
}
