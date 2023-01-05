# [Object](../Object.md) / PropertyAccessTrait

Enable accessing source data as object properties.

## Trait synopsis

```php
trait InvokableTrait
{
    use TypeTrait;

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
}
```

## Examples

```php

use Phrity\O\Object\PropertyAccessTrait;

class MyClass
{
    use PropertyAccessTrait;

    public function __construct(object $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass((object)["a" => 1]);
$class->a; // => 1
$class->b = 2;
isset($class->a); // => true
unset($class->b);
```
