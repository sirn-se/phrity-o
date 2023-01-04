# [Array](../Array.md) / StringableTrait

Trait that implements the [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion of class to `classname(count)` (namespace is excluded).

## Trait synopsis

```php
trait StringableTrait
{
    use TypeTrait;

    // Stringable interface implementation.

    /**
     * Return string representation.
     * @return string String representation.
     */
    public function __toString(): string;
}
```

## Examples

```php

use Phrity\O\Array\StringableTrait;

class MyClass implements Stringable
{
    use StringableTrait;

    public function __construct(array $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
echo $class; // => "MyClass(3)"
```
