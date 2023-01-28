# [Docs](../../README.md) / [String](../String.md) / CoercionTrait

Trait that support coercing non-string content as input.
By default, only support string input. By setting `o_option_coerce` to `true`, the following input is supported.

* string
* integer
* null (as "")
* self
* integer
* float
* boolean
* object with __toString method

## Trait synopsis

```php
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return string Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): string;
}
```

## Examples

```php

use Phrity\O\String\CoercionTrait;

class MyClass
{
    use CoercionTrait;

    public function __construct(mixed $input)
    {
        $this->o_option_coerce = true; // Enables coercion
        $this->initialize($input);
    }
}

$class1 = new MyClass("hey"); // => "hey"
$class2 = new MyClass(null); // => ""
$class3 = new MyClass($class1); // => "hey"
$class4 = new MyClass(123); // => "123"
$class4 = new MyClass(true); // => "1"
$class5 = new MyClass(new Arr([1, 2, 3])); // => "Arr(3)"
```
