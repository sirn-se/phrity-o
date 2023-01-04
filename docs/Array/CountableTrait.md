# [Array](../Array.md) / CountableTrait

Trait that implements the [Countable](https://www.php.net/manual/en/class.countable.php) interface.
Enables `count()` function on class.

## Trait synopsis

```php
trait CountableTrait
{
    use TypeTrait;

    // Countable interface implementation.

    /**
     * Count elements of an object.
     * @return int Number of elements.
     */
    public function count(): int;
}
```

## Examples

```php

use Phrity\O\Array\CountableTrait;

class MyClass implements Countable
{
    use CountableTrait;

    public function __construct(array $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
count($class); // => 3
```
