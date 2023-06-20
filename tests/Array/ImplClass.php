<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use ArrayAccess;
use Iterator;
use Phrity\O\Array\{
    ArrayAccessTrait,
    CoercionTrait,
    ComparableTrait,
    CountableTrait,
    IteratorTrait,
    QueueTrait,
    StackTrait,
    StringableTrait,
    TypeTrait
};

/**
 * Trait-using class for Phrity\O\Array\* tests.
 */
class ImplClass implements ArrayAccess, Iterator
{
    use ArrayAccessTrait;
    use CoercionTrait;
    use ComparableTrait;
    use CountableTrait;
    use IteratorTrait;
    use QueueTrait;
    use StackTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for test class.
     * @oparam array $data Initial value.
     * @oparam bool $coerce Coercion mode.
     * @oparam bool $access_supress_error Access error mode.
     */
    public function __construct(array $data, bool $coerce = false, bool $access_supress_error = false)
    {
        $this->o_option_coerce = $coerce;
        $this->o_option_access_supress_error = $access_supress_error;
        $this->initialize($data);
    }

    /**
     * Method used for coercion tests.
     * @oparam mixed $content Value to coerce.
     * @return array Coerced value.
     */
    public function testCoercion(mixed $content): array
    {
        return $this->coerce($content);
    }
}
