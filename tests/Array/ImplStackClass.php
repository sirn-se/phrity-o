<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use IteratorAggregate;
use Phrity\O\Array\{
    StackIteratorTrait,
    TypeTrait
};

/**
 * Trait-using class for Phrity\O\Array\* tests.
 * @implements IteratorAggregate<array-key, mixed>
 */
class ImplStackClass implements IteratorAggregate
{
    use StackIteratorTrait;
    use TypeTrait;

    /**
     * Constructor for test class.
     * @param array<array-key, mixed> $data Initial value.
     * @param bool $coerce Coercion mode.
     */
    public function __construct(array $data, bool $coerce = false)
    {
        $this->o_option_coerce = $coerce;
        $this->initialize($data);
    }
}
