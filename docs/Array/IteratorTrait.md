# [Docs](../../README.md) / [Array](../Array.md) / IteratorTrait

Trait that implements the [Iterator](https://www.php.net/manual/en/class.iterator.php) and
[Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing methods such as `foreach()`;

## Trait synopsis

```php
trait IteratorTrait
{
    use TypeTrait;

    // Iterator interface methods.

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
}
```

## Examples

```php

use Phrity\O\Array\IteratorTrait;

class MyClass implements Iterator, Traversable
{
    use IteratorTrait;

    public function __construct(array $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ...
}
```
