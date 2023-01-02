# Array > StackTrait

Adds stack methods.
As a Stack (LIFO) implementation, `push` will put items at the top and `pop` will retrieve the last added item.


#### Trait synopsis

```php
trait StackTrait
{
     // Stack methods

     public function push(mixed $item): void;
     public function pop(): mixed;
}
```

#### Usage

```php
class MyClass
{
    use StackTrait;
}
```

#### Examples

```php
$class = new MyClass();
$class->push('A');
$class->push('B');
$class->push('C');
$class->pop(); // => "C"
$class->pop(); // => "B"
$class->pop(); // => "A"
$class->pop(); // => null
```
