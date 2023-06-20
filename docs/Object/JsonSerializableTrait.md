# [Docs](../../README.md) / [Object](../Object.md) / JsonSerializableTrait

Trait that implements [JsonSerializable](https://www.php.net/manual/en/jsonserializable.jsonserialize.php) interface.
Provides class properties for JSON encode.

## Trait synopsis

```php
trait JsonSerializableTrait
{
    use TypeTrait;

    // JsonSerializable interface implementation.

    /**
     * @return mixed Class serialization content
     */
    public function jsonSerialize(): mixed;
}
```

## Examples

```php

use Phrity\O\Object\JsonSerializableTrait;

class MyClass implements JsonSerializable
{
    use JsonSerializableTrait;

    public function __construct(object $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass((object)["a" => 1]);
echo json_encode($class); // => '{"a":1}'
```
