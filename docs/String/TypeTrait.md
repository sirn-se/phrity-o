# [String](../String.md) / TypeTrait

Base trait for all traits using string as source.
Defines source property, options and the `initialize` method.

## Trait synopsis

```php
trait TypeTrait
{
    protected string $o_string_source;
    protected string $o_source_ref = 'o_float_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param string $value Initial value.
     */
    protected function initialize(string $value = ""): void;
}

```

## Examples

```php

use Phrity\O\String\TypeTrait;

class MyClass
{
    use TypeTrait;

    public string $my_string_source;

    public function __construct(string $data)
    {
        // Use $my_string_source as source instead of default $o_string_source
        $this->o_source_ref = 'my_string_source';

        $this->initialize($data);
    }
}

$class = new MyClass("hey");
$class->my_string_source; // => "hey"
```
