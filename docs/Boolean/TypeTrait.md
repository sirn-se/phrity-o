# [Docs](../../README.md) / [Boolean](../Boolean.md) / TypeTrait

Base trait for all traits using boolean as source.
Defines source property, options and the `initialize` method.

## Trait synopsis

```php
trait TypeTrait
{
    protected bool $o_boolean_source;
    protected string $o_source_ref = 'o_boolean_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param bool $value Initial value.
     */
    protected function initialize(bool $value = false): void;
}

```

## Examples

```php

use Phrity\O\Boolean\TypeTrait;

class MyClass
{
    use TypeTrait;

    public bool $my_boolean_source;

    public function __construct(bool $data)
    {
        // Use $my_boolean_source as source instead of default $o_boolean_source
        $this->o_source_ref = 'my_boolean_source';

        $this->initialize($data);
    }
}

$class = new MyClass(true);
$class->my_boolean_source; // => true
```
