# [Number](../Number.md) / ComparableTrait

Trait that implements the [Comparable](https://github.com/sirn-se/phrity-comparison) and
[Equalable](https://github.com/sirn-se/phrity-comparison) interfaces.
Allows comparing class instances based on internal content.

## Trait synopsis

```php
trait ComparableTrait
{
    use ComparisonTrait;
    use TypeTrait;

    // Comparable interface methods.

    /**
     * Compare $this with provided instance of the same class.
     * @param  mixed $compare_with The instance to compare with.
     * @return int -1, 0 or +1 comparison result.
     */
    public function compare(mixed $compare_with): int;

    // Equalable interface methods (inherited).

    /**
     * If $this is equal to $compare_with.
     * @param  mixed $compare_with The instance to compare with.
     * @return boolean True if $this is equal to $compare_with.
     * @throws IncomparableException If $this can not be compared with $compare_with.
     */
    public function equals(mixed $compare_with): bool;

    // Comparable interface methods (inherited).

    /**
     * If $this is greater than $compare_with.
     * @param  mixed $compare_with The instance to compare with.
     * @return boolean True if $this is greater than $compare_with.
     * @throws IncomparableException If $this can not be compared with $compare_with.
     */
    public function greaterThan(mixed $compare_with): bool;

    /**
     * If $this is greater than or equal to $compare_with.
     * @param  mixed $compare_with The instance to compare with.
     * @return boolean True if $this is greater than or equal to $compare_with.
     * @throws IncomparableException If $this can not be compared with $compare_with.
     */
    public function greaterThanOrEqual(mixed $compare_with): bool;

    /**
     * If $this is less than $compare_with.
     * @param  mixed $compare_with The instance to compare with.
     * @return boolean True if $this is less than $compare_with.
     * @throws IncomparableException If $this can not be compared with $compare_with.
     */
    public function lessThan(mixed $compare_with): bool;

    /**
     * If $this is less than or equal to $compare_with.
     * @param  mixed $compare_with The instance to compare with.
     * @return boolean True if $this is less than or equal to $compare_with.
     * @throws IncomparableException If $this can not be compared with $compare_with.
     */
    public function lessThanOrEqual(mixed $compare_with): bool;
}
```

## Examples

```php

use Phrity\O\Number\ComparableTrait;
use Phrity\Comparison\{
    Comparable,
    Equalable
};

class MyClass implements Comparable, Equalable
{
    use ComparableTrait;

    public function __construct(float $input)
    {
        $this->initialize($input);
    }
}

$class_a = new MyClass(123.45);
$class_b = new MyClass(456.78);
$class_a->equals($class_b);
$class_a->greaterThan($class_b);
$class_a->greaterThanOrEqual($class_b);
$class_a->lessThan($class_b);
$class_a->lessThanOrEqual($class_b);
$class_a->compare($class_b);
```
