# [Docs](../../README.md) / [Array](../Array.md) / ArrayAccessTrait

Trait that implements the [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) interface.
Allows accessing class as an array, using `[]` with offset to get, set and check array content.

Get with non-existing offset will throw [OutOfBoundsException](https://www.php.net/manual/en/class.outofboundsexception),
or return null if option `o_option_access_supress_error` is set to `true`.

## Trait synopsis

```php
trait ArrayAccessTrait
{
    use TypeTrait;

    // ArrayAccess interface methods.

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
}
```

## Examples

```php

use Phrity\O\Array\ArrayAccessTrait;

class MyClass implements ArrayAccess
{
    use ArrayAccessTrait;

    public function __construct(array $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
isset($class['a']); // => true
unset($class['c']);
$class['b']; // => 2
$class['d'] = 4;
$class[] = 5;
```
