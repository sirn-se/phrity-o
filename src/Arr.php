<?php

/**
 * File for O\Arr class.
 * @package Phrity > O
 */

namespace Phrity\O;

use ArrayAccess;
use Countable;
use Iterator;
use Stringable;
use InvalidArgumentException;
use Phrity\Comparison\{
    Comparable
};
use Phrity\O\Array\{
    ArrayAccessTrait,
    ComparableTrait,
    CountableTrait,
    IteratorTrait,
    StringableTrait
};

/**
 * O\Arr class.
 */
class Arr implements ArrayAccess, Countable, Iterator, Stringable, Comparable
{
    use ArrayAccessTrait;
    use ComparableTrait;
    use CountableTrait;
    use IteratorTrait;
    use StringableTrait;

    /**
     * Constructor for O\Arr
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new InvalidArgumentException('Unsupported argument for O\Arr');
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
            return $this->o_array_source = $content;
        }
        if ($content instanceof self) {
            return $this->o_array_source = $content->o_array_source;
        }
        if (is_object($content)) {
            // Converts to associative array, only public properties of input object
            return $this->o_array_source = json_decode(json_encode($content), true);
        }
        throw new InvalidArgumentException('Unsupported input data for O\Arr');
    }
}
