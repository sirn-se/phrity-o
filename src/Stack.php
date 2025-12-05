<?php

namespace Phrity\O;

use ArgumentCountError;
use Countable;
use IteratorAggregate;
use Phrity\Comparison\Comparable;
use Phrity\O\Array\{
    CoercionTrait,
    ComparableTrait,
    CountableTrait,
    StackIteratorTrait,
    StackTrait,
    StringableTrait,
    TypeTrait
};
use Stringable;

/**
 * Phrity\O\Stack class.
 * @implements IteratorAggregate<array-key, mixed>
 */
class Stack implements Countable, IteratorAggregate, Comparable, Stringable, SourceInterface
{
    use CoercionTrait;
    use ComparableTrait;
    use CountableTrait;
    use StackIteratorTrait;
    use StackTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for O\Stack
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Setup - use coersion.
        $this->o_option_coerce = true;

        // Allow subclass to use additional input.
        $content = array_shift($args);
        $this->initialize(array_values($this->coerce($content)));

        if (!empty($args)) {
            $class = self::class;
            throw new ArgumentCountError("Unsupported argument for {$class}.");
        }
    }
}
