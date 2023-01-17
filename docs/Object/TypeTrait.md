# [Docs](../../README.md) / [Object](../Object.md) / TypeTrait

Base trait for all traits using object as source.
Defines source property, options and the `initialize` method.

## Trait synopsis

```php
trait TypeTrait
{
    protected object $o_object_source;
    protected string $o_source_ref = 'o_object_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param object $value Initial value.
     */
    protected function initialize(object $value = (object)[])): void;
}

```

## Examples

```php

use Phrity\O\Object\TypeTrait;

class MyClass
{
    use TypeTrait;

    public object $my_object_source;

    public function __construct(object $data)
    {
        // Use $my_object_source as source instead of default $o_object_source
        $this->o_source_ref = 'my_object_source';

        $this->initialize($data);
    }
}

$class = new MyClass((object)["a" => 1]);
$class->my_object_source; // => {a: 1}
```
