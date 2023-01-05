# [Integer](../Integer.md) / TypeTrait

Base trait for all traits using integer as source.
Defines source property, options and the `initialize` method.

## Trait synopsis

```php
trait TypeTrait
{
    protected int $o_integer_source;
    protected string $o_source_ref = 'o_integer_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param int $value Initial value.
     */
    protected function initialize(int $value = 0): void;
}

```

## Examples

```php

use Phrity\O\Integer\TypeTrait;

class MyClass
{
    use TypeTrait;

    public int $my_integer_source;

    public function __construct(int $data)
    {
        // Use $my_integer_source as source instead of default $o_integer_source
        $this->o_source_ref = 'my_integer_source';

        $this->initialize($data);
    }
}

$class = new MyClass(123);
$class->my_integer_source; // => 123
```
