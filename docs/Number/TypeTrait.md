# [Number](../Number.md) / TypeTrait

Base trait for all traits using float as source.
Defines source property, options and the `initialize` method.

## Trait synopsis

```php
trait TypeTrait
{
    protected float $o_float_source;
    protected string $o_source_ref = 'o_float_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param float $value Initial value.
     */
    protected function initialize(float $value = 0.0): void;
}

```

## Examples

```php

use Phrity\O\Number\TypeTrait;

class MyClass
{
    use TypeTrait;

    public float $my_float_source;

    public function __construct(float $data)
    {
        // Use $my_float_source as source instead of default $o_float_source
        $this->o_source_ref = 'my_float_source';

        $this->initialize($data);
    }
}

$class = new MyClass(123.45);
$class->my_float_source; // => 123.45
```
