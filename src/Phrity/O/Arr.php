<?php

namespace Phrity\O;

class Arr implements \ArrayAccess, \Countable, \Iterator
{
    protected $o_content = [];

    public function __construct(...$args)
    {
        if (is_array($args[0])) {
            $this->o_content = array_shift($args);
        }
    }


    // ArrayAccess interface implementation

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->o_content);
    }

    public function offsetGet($offset)
    {
        return $this->o_content[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->o_content[] = $value;
        } else {
            $this->o_content[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->o_content[$offset]);
    }


    // Countable interface implementation

    public function count()
    {
        return count($this->o_content);
    }


    // Iterator interface implementation

    public function current()
    {
        return current($this->o_content);
    }

    public function key()
    {
        return key($this->o_content);
    }

    public function next()
    {
        return next($this->o_content);
    }

    public function rewind()
    {
        return reset($this->o_content);
    }

    public function valid()
    {
        return $this->offsetExists(key($this->o_content));
    }
}
