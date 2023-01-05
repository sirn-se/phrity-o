# [Integer](../Integer.md) / StringableTrait

Trait that implements the [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion of class to numeric output.

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

use Phrity\O\Integer\StringableTrait;

class MyClass implements Stringable
{
    use StringableTrait;

    public function __construct(int $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(123);
echo $class; // => 123
```
