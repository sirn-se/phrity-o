# [Array](../Array.md) / Queue

Queue implementation class. Uses the following traits;

* [CoercionTrait](CoercionTrait.md)
* [ComparableTrait](ComparableTrait.md)
* [CountableTrait](CountableTrait.md)
* [QueueIteratorTrait](QueueIteratorTrait.md)
* [QueueTrait](QueueTrait.md)
* [StringableTrait](StringableTrait.md)
* [TypeTrait](TypeTrait.md)

Implements the following interfaces;

* [Comparable](https://github.com/sirn-se/phrity-comparison) and [Equalable](https://github.com/sirn-se/phrity-comparison)
* [Countable](https://www.php.net/manual/en/class.countable.php)
* [Stringable](https://www.php.net/manual/en/class.stringable).
* [IteratorAggregate](https://www.php.net/manual/en/class.iterator.php) and [Traversable](https://www.php.net/manual/en/class.traversable.php)

## Trait synopsis

```php
class Queue implements Countable, IteratorAggregate, Comparable, Stringable
{
    use CoercionTrait;
    use ComparableTrait;
    use CountableTrait;
    use QueueIteratorTrait;
    use QueueTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for Phrity\O\Queue.
     * @param mixed ...$args Input data.
     * @throws ArgumentCountError If too many arguments provided.
     */
    public function __construct(mixed ...$args);

    // CoercionTrait methods.

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return array Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): array

    // ComparableTrait methods.

    /**
     * Compare $this with provided instance of the same class.
     * @param  mixed $compare_with The object to compare with.
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
     * Count elements of an object.
     * @return int Number of elements.
     */
    public function count(): int;

    // QueueIteratorTrait methods.

    /**
     * Consume array and yield key/value pair.
     * @return Generator The iterator function.
     */
    public function getIterator(): Generator;

    // QueueTrait methods.

    /**
     * Add item to the end of queue.
     * @param mixed $item Item to add.
     */
    public function enqueue(mixed $item): void;

    /**
     * Retrieve item from queue.
     * @return mixed $item Get and remove first item in queue.
     */
    public function dequeue(): mixed;

    // StringableTrait methods.

    /**
     * Return string representation.
     * @return string String representation.
     */
    public function __toString(): string;

    // TypeTrait methods.

    /**
     * Initializer, typically called in constructor.
     * @param object $value Initial value.
     */
    protected function initialize(array $value = []): void;
}
```

## Examples

```php
use Phrity\O\Queue;

$queue = new Queue([1, 2, 3]);
$queue->enqueue(4);
$queue->dequeue(); // => 1
count($queue); // Countable support
foreach ($queue as $key => $item) {
    // Consuming iterator support
}
$queue->equals(new Queue([2, 3, 4])); // Comparison support
```
