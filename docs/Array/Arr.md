# [Docs](../../README.md) / [Array](../Array.md) / Arr

Generic array class. Uses the following traits;

* [ArrayAccessTrait](ArrayAccessTrait.md)
* [CoercionTrait](CoercionTrait.md)
* [ComparableTrait](ComparableTrait.md)
* [CountableTrait](CountableTrait.md)
* [IteratorTrait](IteratorTrait.md)
* [JsonSerializableTrait](JsonSerializableTrait.md)
* [StringableTrait](StringableTrait.md)
* [TypeTrait](TypeTrait.md)

Implements the following interfaces;

* [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php)
* [Comparable](https://github.com/sirn-se/phrity-comparison) and [Equalable](https://github.com/sirn-se/phrity-comparison)
* [Countable](https://www.php.net/manual/en/class.countable.php)
* [Iterator](https://www.php.net/manual/en/class.iterator.php) and [Traversable](https://www.php.net/manual/en/class.traversable.php)
* [JsonSerializable](https://www.php.net/manual/en/class.jsonserializable.php)
* [Stringable](https://www.php.net/manual/en/class.stringable)

## Trait synopsis

```php
class Arr implements ArrayAccess, Comparable, Countable, Iterator, JsonSerializable, Stringable
{
    use ArrayAccessTrait;
    use CoercionTrait;
    use ComparableTrait;
    use CountableTrait;
    use IteratorTrait;
    use JsonSerializableTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for Phrity\O\Integer.
     * @param mixed ...$args Input data.
     * @throws ArgumentCountError If too many arguments provided.
     */
    public function __construct(mixed ...$args);

    // ArrayAccessTrait methods.

    /**
     * Whether an offset exists.
     * @param  mixed $offset An offset to check for.
     * @return True if offset exist.
     */
    public function offsetExists(mixed $offset): bool;

    /**
     * Returns the value at specified offset.
     * @param  mixed $offset The offset to retrieve.
     * @return mixed Value for offset.
     */
    public function offsetGet(mixed $offset): mixed;

    /**
     * Assigns a value to the specified offset.
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     */
    public function offsetSet(mixed $offset, mixed $value): void;

    /**
     * Unsets an offset.
     * @param mixed $offset The offset to unset.
     */
    public function offsetUnset(mixed $offset): void;

    // CoercionTrait methods.

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return array Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): array;

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

    // CountableTrait methods.

    /**
     * Count elements of instance.
     * @return int Number of elements.
     */
    public function count(): int;

    // IteratorTrait methods.

    /**
     * Return the current element.
     * @return mixed Current element.
     */
    public function current(): mixed;

    /**
     * Return the key of the current element.
     * @return scalar|null Current key.
     */
    public function key(): mixed;

    /**
     * Move forward to next element.
     */
    public function next(): void;

    /**
     * Rewind the Iterator to the first element.
     */
    public function rewind(): void;

    /**
     * Checks if current position is valid.
     * @return bool True if valid.
     */
    public function valid(): bool;

    // Iterator methods not in interface.

    /**
     * Move backward to previous element.
     * @return mixed Returns the value in the previous position.
     */
    public function previous(): mixed;

    /**
     * Advance the Iterator to the last element.
     * @return mixed Returns the value of the last element.
     */
    public function forward(): mixed;

    // JsonSerializableTrait methods.

    /**
     * @return mixed Class serialization content
     */
    public function jsonSerialize(): mixed;

    // StringableTrait methods.

    /**
     * Return string representation.
     * @return string String representation.
     */
    public function __toString(): string;

    // TypeTrait methods.

    /**
     * Initializer, typically called in constructor.
     * @param array $value Initial value.
     */
    protected function initialize(array $value = []): void;
}
```

## Examples

```php
use Phrity\O\Arr;

$array = new Arr([1, 2, 3]);
$array[] = 7; // ArrayAccess support
count($array); // Countable support
foreach ($array as $key => $value) {
    // Iterator support
}
$array->equals(new Arr([2, 3, 4])); // Comparison support
echo $array; // Stringable support
```
