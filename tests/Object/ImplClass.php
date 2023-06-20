<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use IteratorAggregate;
use JsonSerializable;
use Phrity\O\Object\{
    CoercionTrait,
    ComparableTrait,
    IteratorAggregateTrait,
    JsonSerializableTrait,
    PropertyAccessTrait,
    StringableTrait,
    TypeTrait
};

/**
 * Trait-using class for Phrity\O\Object\* tests.
 */
class ImplClass implements IteratorAggregate, JsonSerializable
{
    use CoercionTrait;
    use ComparableTrait;
    use IteratorAggregateTrait;
    use JsonSerializableTrait;
    use PropertyAccessTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for test class.
     * @oparam object $data Initial value.
     * @oparam bool $coerce Coercion mode.
     * @oparam bool $access_supress_error Access error mode.
     */
    public function __construct(object $data, bool $coerce = false, bool $access_supress_error = false)
    {
        $this->o_option_coerce = $coerce;
        $this->o_option_access_supress_error = $access_supress_error;
        $this->initialize($data);
    }

    /**
     * Method used for coercion tests.
     * @oparam mixed $content Value to coerce.
     * @return object Coerced value.
     */
    public function testCoercion(mixed $content): object
    {
        return $this->coerce($content);
    }
}
