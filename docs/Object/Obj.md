# [Docs](../../README.md) / [Object](../Object.md) / Obj

Generic object class. Uses the following traits;

* [CoercionTrait](CoercionTrait.md)
* [ComparableTrait](ComparableTrait.md)
* [IteratorAggregateTrait](IteratorAggregateTrait.md)
* [PropertyAccessTrait](PropertyAccessTrait.md)
* [StringableTrait](StringableTrait.md)
* [TypeTrait](TypeTrait.md)

Implements the following interfaces;

* [Comparable](https://github.com/sirn-se/phrity-comparison) and [Equalable](https://github.com/sirn-se/phrity-comparison)
* [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) and [Traversable](https://www.php.net/manual/en/class.traversable.php)
* [Stringable](https://www.php.net/manual/en/class.stringable)

## Trait synopsis

```php
class Obj implements Stringable, Comparable, IteratorAggregate
{
    use CoercionTrait;
    use ComparableTrait;
    use IteratorAggregateTrait;
    use PropertyAccessTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for Phrity\O\Str.
     * @param mixed ...$args Input data.
     * @throws ArgumentCountError If too many arguments provided.
     */
    public function __construct(mixed ...$args);

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return string Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): string;

    // ComparableTrait methods.

    /**
     * Compare $this with provided instance of the same class.
     * @param  mixed $compare_with The instance to compare with.
     * @return int -1, 0 or +1 comparison result.
     */
    public function compare(mixed $compare_with): int;

    /**
     * If $this is equal to $compare_with.
     * @param  mixed $compare_with The instance to compare with.
     * @return boolean True if $this is equal to $compare_with.
     * @throws IncomparableException If $this can not be compared with $compare_with.
     */
    public function equals(mixed $compare_with): bool;

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

    // IteratorAggregate methods.

    /**
     * Iterate object properties and yield key/value pair.
     * @return Generator The iterator function.
     */
    public function getIterator(): Generator;

    // PropertyAccessTrait methods.

    /**
     * Returns the value of specified property.
     * @param  string $key The property to retrieve.
     * @return mixed Value for property.
     * @throws Error If specified property do not exist.
     */
    public function __get(string $key): mixed;

    /**
     * Assigns a value on specified property.
     * @param string $key The property to assign the value to.
     * @param mixed $value The value to set.
     */
    public function __set(string $key, mixed $value): void;

    /**
     * Whether a property exists.
     * @param string $key A property to check for.
     * @return True if property exist.
     */
    public function __isset(string $key): bool;

    /**
     * Unsets a property.
     * @param string $key The property to unset.
     */
    public function __unset(string $key): void;

    // StringableTrait methods.

    /**
     * Return string representation.
     * @return string String representation.
     */
    public function __toString(): string;

    // TypeTrait methods.

    /**
     * Initializer, typically called in constructor.
     * @param string $value Initial value.
     */
    protected function initialize(string $value = ""): void;
}
```

## Examples

```php
use Phrity\O\Str;

$object = new Obj((object)["a" => 1]);
$object->a; // property access support
$object->equals(new Obj((object)["b" => 2])); // Comparison support
echo $object; // Stringable support
```
