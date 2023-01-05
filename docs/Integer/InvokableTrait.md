# [Integer](../Integer.md) / InvokableTrait

Allows get and set by invoke call.

## Trait synopsis

```php
trait InvokableTrait
{
    use TypeTrait;

    /**
     * Getter/setter implementation.
     * @param  int ...$args Input data.
     * @return int Current value.
     * @throws ArgumentCountError If called with too many arguments.
     */
    public function __invoke(int ...$args): int;
}
```

## Examples

```php

use Phrity\O\Integer\InvokableTrait;

class MyClass
{
    use InvokableTrait;

    public function __construct(int $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(123);
$class(); // => 123
$class(456); // => 456
```
