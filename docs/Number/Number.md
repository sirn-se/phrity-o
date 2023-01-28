# [Docs](../../README.md) / [Number](../Number.md) / Number

Generic float class. Uses the following traits;

* [CoercionTrait](CoercionTrait.md)
* [ComparableTrait](ComparableTrait.md)
* [InvokableTrait](InvokableTrait.md)
* [StringableTrait](StringableTrait.md)
* [TypeTrait](TypeTrait.md)

Implements the following interfaces;

* [Comparable](https://github.com/sirn-se/phrity-comparison) and [Equalable](https://github.com/sirn-se/phrity-comparison)
* [Stringable](https://www.php.net/manual/en/class.stringable)

## Trait synopsis

```php
class Number implements Stringable, Comparable
{
    use CoercionTrait;
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for Phrity\O\Number.
     * @param mixed ...$args Input data.
     * @throws ArgumentCountError If too many arguments provided.
     */
    public function __construct(mixed ...$args);

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return float Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): float;

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

    // InvokableTrait methods.

    /**
     * Getter/setter implementation.
     * @param  float ...$args Input data.
     * @return float Current value.
     * @throws ArgumentCountError If called with too many arguments.
     */
    public function __invoke(float ...$args): float;

    // StringableTrait methods.

    /**
     * Return string representation.
     * @return string String representation.
     */
    public function __toString(): string;

    // TypeTrait methods.

    /**
     * Initializer, typically called in constructor.
     * @param float $value Initial value.
     */
    protected function initialize(float $value = 0.0): void;
}
```

## Examples

```php
use Phrity\O\Number;

$number = new Number(123.45);
$number(456.78); // Invokable support
$number->equals(new Number(789.01)); // Comparison support
echo $number; // Stringable support
```
