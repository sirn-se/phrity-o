<?php

namespace Phrity\O;

use ArgumentCountError;
use Phrity\Comparison\Comparable;
use Phrity\O\Object\{
    CoercionTrait,
    ComparableTrait,
    PropertyAccessTrait,
    StringableTrait,
    TypeTrait
};
use Stringable;

/**
 * Phrity\O\Obj class.
 */
class Obj implements Comparable, Stringable, SourceInterface
{
    use CoercionTrait;
    use ComparableTrait;
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
