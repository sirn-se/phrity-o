# Array > CountableTrait

Trait that implements the [Countable](https://www.php.net/manual/en/class.countable.php) interface.
Enables `count()` function on class.

#### Trait synopsis

```php
trait CountableTrait
{
     // Countable interface methods

     public function count(): int;
}
```

#### Usage

```php
class MyClass implements Countable
{
    use CountableTrait;
}
```

#### Examples

```php
$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
count($class); // => 3
```
