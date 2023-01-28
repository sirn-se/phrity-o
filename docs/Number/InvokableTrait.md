# [Docs](../../README.md) / [Number](../Number.md) / InvokableTrait

Allows get and set by invoke call.

## Trait synopsis

```php
trait InvokableTrait
{
    use TypeTrait;

    /**
     * Getter/setter implementation.
     * @param  float ...$args Input data.
     * @return float Current value.
     * @throws ArgumentCountError If called with too many arguments.
     */
    public function __invoke(float ...$args): float;
}
```

## Examples

```php

use Phrity\O\Number\InvokableTrait;

class MyClass
{
    use InvokableTrait;

    public function __construct(float $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(123.45);
$class(); // => 123.45
$class(456.78); // => 456.78
```
