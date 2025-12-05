<?php

namespace Phrity\O;

use ArgumentCountError;
use IteratorAggregate;
use JsonSerializable;
use Phrity\Comparison\Comparable;
use Phrity\O\Object\{
    CoercionTrait,
    ComparableTrait,
    IteratorAggregateTrait,
    JsonSerializableTrait,
    PropertyAccessTrait,
    StringableTrait,
    TypeTrait
};
use Stringable;

/**
 * Phrity\O\Obj class.
 * @implements IteratorAggregate<array-key, mixed>
 */
class Obj implements Comparable, IteratorAggregate, JsonSerializable, Stringable, SourceInterface
{
    use CoercionTrait;
    use ComparableTrait;
    use IteratorAggregateTrait;
    use JsonSerializableTrait;
    use PropertyAccessTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for Phrity\O\Object.
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
