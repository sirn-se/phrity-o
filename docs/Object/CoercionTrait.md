# [Docs](../../README.md) / [Object](../Object.md) / CoercionTrait

Trait that support coercing non-object content as input.
By default, only support anonymous object input. By setting `o_option_coerce` to `true`, the following input is supported.

* anonymous object
* null (as empty object)
* self
* class (public properties)
* array

## Trait synopsis

```php
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return object Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): object;
}
```

## Examples

```php

use Phrity\O\Object\CoercionTrait;

class MyClass
{
    use CoercionTrait;

    public function __construct(mixed $input)
    {
        $this->o_option_coerce = true; // Enables coercion
        $this->initialize($input);
    }
}

$class1 = new MyClass((object)["a" => 1])); // => {a: 1}
$class2 = new MyClass(null); // => {}
$class3 = new MyClass($class1); // => {a: 1}
$class4 = new MyClass(["b" => 2]); // => {b: 2}
```
