# [Docs](../../README.md) / [Boolean](../Boolean.md) / CoercionTrait

Trait that support coercing non-boolean content as input.
By default, only support boolean input. By setting `o_option_coerce` to `true`, the following input is supported.

* bool
* null (as false)
* self
* numeric (0 is false)

## Trait synopsis

```php
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return bool Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): bool;
}
```

## Examples

```php

use Phrity\O\Boolean\CoercionTrait;

class MyClass
{
    use CoercionTrait;

    public function __construct(mixed $input)
    {
        $this->o_option_coerce = true; // Enables coercion
        $this->initialize($input);
    }
}

$class1 = new MyClass(true); // => true
$class2 = new MyClass(null); // => false
$class3 = new MyClass($class1); // => true
$class4 = new MyClass("1"); // => true
```
