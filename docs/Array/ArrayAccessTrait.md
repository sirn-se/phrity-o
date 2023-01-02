# Array > ArrayAccessTrait

Trait that implements the [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) interface.
Allows accessing class as if it were an array.

#### Trait synopsis

```php
trait ArrayAccessTrait
{
    // ArrayAccess interface methods

    public function offsetExists(mixed $offset): bool;
    public function offsetGet(mixed $offset): mixed;
    public function offsetSet(mixed $offset, mixed $value): void;
    public function offsetUnset(mixed $offset): void;
}
```

#### Usage

```php
class MyClass implements ArrayAccess
{
    use ArrayAccessTrait;
}
```

#### Examples

```php
$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
isset($class['a']); // => true
unset($class['c']);
$class['b']; // => 2
$class['d'] = 4;
$class[] = 5;
```
