# [String](../String.md) / InvokableTrait

Allows get and set by invoke call.

## Trait synopsis

```php
trait InvokableTrait
{
    use TypeTrait;

    /**
     * Getter/setter implementation.
     * @param  string ...$args Input data.
     * @return string Current value.
     * @throws ArgumentCountError If called with too many arguments.
     */
    public function __invoke(string ...$args): string;
}
```

## Examples

```php

use Phrity\O\String\InvokableTrait;

class MyClass
{
    use InvokableTrait;

    public function __construct(string $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass("hey");
$class(); // => "hey"
$class("joe"); // => "joe"
```
