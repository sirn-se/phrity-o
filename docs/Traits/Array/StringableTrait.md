# Array > StringableTrait

Trait that implements the [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion to `classname(count)` (namespaces are excluded).

#### Trait synopsis

```php
trait StringableTrait
{
     // Stringable interface methods

     public function __toString(): string;
}
```

#### Usage

```php
class MyClass implements Stringable
{
    use StringableTrait;
}
```

#### Examples

```php
$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
echo $class; // => "MyClass(3)"
```
