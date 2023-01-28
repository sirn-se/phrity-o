# [Docs](../../README.md) / [String](../String.md) / StringableTrait

Trait that implements the [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion of class to string output.

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

use Phrity\O\String\StringableTrait;

class MyClass implements Stringable
{
    use StringableTrait;

    public function __construct(string $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass("hey");
echo $class; // => "hey"
```
