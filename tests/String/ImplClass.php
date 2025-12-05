<?php

declare(strict_types=1);

namespace Phrity\O\Test\String;

use Phrity\O\String\{
    CoercionTrait,
    ComparableTrait,
    InvokableTrait,
    StringableTrait,
    TypeTrait
};

/**
 * Trait-using class for Phrity\O\String\* tests.
 */
class ImplClass
{
    use CoercionTrait;
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for test class.
     * @param string $data Initial value.
     * @param bool $coerce Coercion mode.
     */
    public function __construct(string $data, bool $coerce = false)
    {
        $this->o_option_coerce = $coerce;
        $this->initialize($data);
    }

    /**
     * Method used for coercion tests.
     * @param mixed $content Value to coerce.
     * @return string Coerced value.
     */
    public function testCoercion(mixed $content): string
    {
        return $this->coerce($content);
    }
}
