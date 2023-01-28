# [Docs](../../README.md) / [Integer](../Integer.md) / CoercionTrait

Trait that support coercing non-integer content as input.
By default, only support integer input. By setting `o_option_coerce` to `true`, the following input is supported.

* integer
* null (as 0)
* self
* float without decimals
* numeric string without decimals

## Trait synopsis

```php
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return int Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): int;
}
```

## Examples

```php

use Phrity\O\Integer\CoercionTrait;

class MyClass
{
    use CoercionTrait;

    public function __construct(mixed $input)
    {
        $this->o_option_coerce = true; // Enables coercion
        $this->initialize($input);
    }
}

$class1 = new MyClass(123); // => 123
$class2 = new MyClass(null); // => 0
$class3 = new MyClass($class1); // => 123
$class4 = new MyClass(123.0); // => 123
$class5 = new MyClass("123"); // => 123
```
