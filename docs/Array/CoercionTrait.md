# [Docs](../../README.md) / [Array](../Array.md) / CoercionTrait

Trait that support coercing non-array content as input.
By default, only support array input. By setting `o_option_coerce` to `true`, the following input is supported.

* array
* null
* self
* object (public properties only)

## Trait synopsis

```php
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return array Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): array;
}
```

## Examples

```php

use Phrity\O\Array\CoercionTrait;

class MyClass
{
    use CoercionTrait;

    public function __construct(mixed $input)
    {
        $this->o_option_coerce = true; // Enables coercion
        $this->initialize($input);
    }
}

$class1 = new MyClass([1, 2]); // => [1, 2]
$class2 = new MyClass(null); // => []
$class3 = new MyClass($class1); // => [1, 2]
$class4 = new MyClass((object)['a' => 1, 'b' => 2]); // => ['a' => 1, 'b' => 2]
```
