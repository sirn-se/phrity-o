<?php

/**
 * File for O\Stack class.
 * @package Phrity > O
 */

namespace Phrity\O;

use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use Stringable;
use Phrity\Comparison\{
    Comparable,
    ComparisonTrait
};
use Phrity\O\Array\{
    ArrayAccessTrait,
    ComparableTrait,
    CountableTrait,
    StackIteratorTrait,
    StackTrait,
    StringableTrait
};

/**
 * O\Stack class.
 */
class Stack implements Countable, IteratorAggregate, Comparable, Stringable
{
    use ComparisonTrait;
    use ComparableTrait;
    use CountableTrait;
    use StackIteratorTrait;
    use StackTrait;
    use StringableTrait;

    /**
     * Constructor for O\Stack
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new InvalidArgumentException('Unsupported argument for O\Stack');
        }
    }

    // Protected internal methods

    /**
     * Bind provided data to internal structure
     * @param  mixed $content Input data
     * @return array          The internal structure
     */
    protected function bind(mixed $content): array
    {
        if (is_null($content)) {
            return $this->o_array_source = [];
        }
        if (is_array($content)) {
            return $this->o_array_source = array_reverse($content);
        }
        if ($content instanceof self) {
            return $this->o_array_source = array_reverse($content->o_array_source);
        }
        throw new InvalidArgumentException('Unsupported input data for O\Stack');
    }
}
