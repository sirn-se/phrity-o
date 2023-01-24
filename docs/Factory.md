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
$instance = $factory->convert([1, 2, 3]); // -> Arr instance

```


        $class = $factory->convert(true);
        $this->assertInstanceOf('Phrity\O\Boolean', $class);

        $class = $factory->convert(0);
        $this->assertInstanceOf('Phrity\O\Integer', $class);

        $class = $factory->convert(0.0);
        $this->assertInstanceOf('Phrity\O\Number', $class);

        $class = $factory->convert((object)[]);
        $this->assertInstanceOf('Phrity\O\Obj', $class);

        $class = $factory->convert('');