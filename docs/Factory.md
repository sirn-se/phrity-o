# [Docs](../../README.md) / Factory

## Convert

The factory class converts scalars, arrays and objects into corresponding "O" instance.
Note that when converting class instances, only public properties of that class will be
converted to the resulting instance.

```php
$factory = new Factory();
$instance = $factory->convert([1, 2, 3]); // -> Arr instance
$instance = $factory->convert(true); // -> Boolean instance
$instance = $factory->convert(123); // -> Integer instance
$instance = $factory->convert(123.45); // -> Number instance
$instance = $factory->convert((object)['a' => 1, 'b' => 2]); // -> Obj instance
$instance = $factory->convert('my string'); // -> Str instance
```

## Class synopsis

```php
class Factory {
    public function convert(mixed $source, bool $recursive = false): object;
}
```
