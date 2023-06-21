# [Docs](../../README.md) / [Array](../Array.md) / JsonSerializableTrait

Trait that implements [JsonSerializable](https://www.php.net/manual/en/jsonserializable.jsonserialize.php) interface.
Provides array content for JSON encode.

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

use Phrity\O\Array\JsonSerializableTrait;

class MyClass implements JsonSerializable
{
    use JsonSerializableTrait;

    public function __construct(array $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass([1, 2, 3]);
echo json_encode($class); // => '[1,2,3]'
```
