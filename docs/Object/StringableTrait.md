# [Object](../Object.md) / StringableTrait

Trait that implements the [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion of class to `classname` (namespace is excluded).

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

use Phrity\O\Object\StringableTrait;

class MyClass implements Stringable
{
    use StringableTrait;

    public function __construct(object $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass((object)["a" => 1]);
echo $class; // => "MyClass"
```
