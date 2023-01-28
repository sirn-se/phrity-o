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
    QueueIteratorTrait,
    QueueTrait,
    StringableTrait,
    TypeTrait
};
use Stringable;

/**
 * Phrity\O\Queue class.
 */
class Queue implements Countable, IteratorAggregate, Comparable, Stringable, SourceInterface
{
    use CoercionTrait;
    use ComparableTrait;
    use CountableTrait;
    use QueueIteratorTrait;
    use QueueTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for Phrity\O\Queue.
     * @param mixed ...$args Input data.
     * @throws ArgumentCountError If too many arguments provided.
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
