<?php

/**
 * File for O\Object\ComparableTrait trait.
 * @package Phrity > O.
 */

namespace Phrity\O\Object;

use Phrity\Comparison\{
    ComparisonTrait,
    IncomparableException
};

/**
 * O\Object\ComparableTrait trait.
 */
trait ComparableTrait
{
    use ComparisonTrait;

    protected object $o_object_source;
    protected string $o_source_ref = 'o_object_source';

    /**
     * Compare $this with provided instance of the same class.
     * @param  mixed $compare_with The object to compare with.
     * @return int -1, 0 or +1 comparison result.
     */
    public function compare(mixed $compare_with): int
    {
        if (!$compare_with instanceof self) {
            $class = self::class;
            throw new IncomparableException("Can only compare {$class}");
        }
        if ($this->{$this->o_source_ref} == $compare_with->{$this->o_source_ref}) {
            return 0;
        }
        return $this->{$this->o_source_ref} > $compare_with->{$this->o_source_ref} ? +1 : -1;
    }
}
