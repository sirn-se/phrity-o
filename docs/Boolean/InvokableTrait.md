# [Docs](../../README.md) / [Boolean](../Boolean.md) / InvokableTrait

Allows get and set by invoke call.

## Trait synopsis

```php
trait InvokableTrait
{
    use TypeTrait;

    /**
     * Getter/setter implementation.
     * @param  bool ...$args Input data.
     * @return bool Current value.
     * @throws ArgumentCountError If called with too many arguments.
     */
    public function __invoke(bool ...$args): bool;
}
```

## Examples

```php

use Phrity\O\Boolean\InvokableTrait;

class MyClass
{
    use InvokableTrait;

    public function __construct(bool $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(false);
$class(); // => false
$class(true); // => true
```
