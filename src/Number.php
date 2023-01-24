<?php

namespace Phrity\O;

use ArgumentCountError;
use Phrity\Comparison\Comparable;
use Phrity\O\Number\{
    CoercionTrait,
    ComparableTrait,
    InvokableTrait,
    StringableTrait,
    TypeTrait
};
use Stringable;

/**
 * Phrity\O\Number class.
 */
class Number implements Comparable, Stringable, SourceInterface
{
    use CoercionTrait;
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for O\Number
     * @param mixed $args Input data
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
