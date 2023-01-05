# [Number](../Number.md) / CoercionTrait

Trait that support coercing non-float content as input.
By default, only support float input. By setting `o_option_coerce` to `true`, the following input is supported.

* float
* integer
* null (as 0)
* self
* numeric string

## Trait synopsis

```php
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return float Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): float
}
```

## Examples

```php

use Phrity\O\Number\CoercionTrait;

class MyClass
{
    use CoercionTrait;

    public function __construct(mixed $input)
    {
        $this->o_option_coerce = true; // Enables coercion
        $this->initialize($input);
    }
}

$class1 = new MyClass(123.45); // => 123.45
$class2 = new MyClass(null); // => 0.0
$class3 = new MyClass($class1); // => 123.45
$class4 = new MyClass(123); // => 123.0
$class5 = new MyClass("123.45"); // => 123.45
```
