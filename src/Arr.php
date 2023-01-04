<?php

namespace Phrity\O;

use ArgumentCountError;
use ArrayAccess;
use Countable;
use Iterator;
use Phrity\Comparison\Comparable;
use Phrity\O\Array\{
    ArrayAccessTrait,
    CoercionTrait,
    ComparableTrait,
    CountableTrait,
    IteratorTrait,
    StringableTrait,
    TypeTrait
};
use Stringable;

/**
 * Phrity\O\Arr class.
 */
class Arr implements ArrayAccess, Countable, Iterator, Stringable, Comparable
{
    use ArrayAccessTrait;
    use CoercionTrait;
    use ComparableTrait;
    use CountableTrait;
    use IteratorTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for Phrity\O\Arr.
     * @param mixed ...$args Input data.
     * @throws ArgumentCountError If too many arguments provided.
     */
    public function __construct(mixed ...$args)
    {
        // Setup - use coersion.
        $this->o_option_coerce = true;

        // Allow subclass to use additional input.
        $content = array_shift($args);
        $this->initialize($this->coerce($content));

        if (!empty($args)) {
            $class = self::class;
            throw new ArgumentCountError("Unsupported argument for {$class}.");
        }
    }
}
