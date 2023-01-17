# [Docs](../../README.md) / [Array](../Array.md) / TypeTrait

Base trait for all traits using array as source.
Defines source property, options and the `initialize` method.

## Trait synopsis

```php
trait TypeTrait
{
    protected array $o_array_source;
    protected string $o_source_ref = 'o_array_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param array $value Initial value.
     */
    protected function initialize(array $value = []): void;
}

```

## Examples

```php

use Phrity\O\Array\TypeTrait;

class MyClass
{
    use TypeTrait;

    public array $my_array_source;

    public function __construct(array $data)
    {
        // Use $my_array_source as source instead of default $o_array_source
        $this->o_source_ref = 'my_array_source';

        $this->initialize($data);
    }
}

$class = new MyClass([1, 2, 3]);
$class->my_array_source; // => [1, 2, 3]
```
