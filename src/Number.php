<?php

/**
 * File for O\Number class.
 * @package Phrity > O
 */

namespace Phrity\O;

use InvalidArgumentException;
use Stringable;
use Phrity\Comparison\Comparable;
use Phrity\O\Number\{
    ComparableTrait,
    InvokableTrait,
    StringableTrait
};

/**
 * O\Number class.
 */
class Number implements Comparable, Stringable
{
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    /**
     * Constructor for O\Number
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new InvalidArgumentException('Unsupported argument for O\Number');
        }
    }

    // Protected internal methods

    /**
     * Bind provided data to internal structure
     * @param  mixed $content Input data
     * @return float          The internal structure
     */
    protected function bind(mixed $content): float
    {
        if (is_numeric($content)) {
            return $this->o_number_source = (float)$content;
        }
        if (is_null($content)) {
            return $this->o_number_source = 0.0;
        }
        if ($content instanceof self) {
            return $this->o_number_source = $content->o_number_source;
        }
        throw new InvalidArgumentException('Unsupported input data for O\Number');
    }
}
