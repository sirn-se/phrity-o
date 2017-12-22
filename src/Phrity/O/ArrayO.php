<?php

namespace Phrity\O;

class ArrayO implements \ArrayAccess, \Countable, \Iterator
{
    protected $o_content = [];
    protected $o_position = 0;

    public function __construct()
    {
        $values = func_get_args();
        foreach ($values as $value) {
          $this->o_content[] = $value;
        }
    }


    // ArrayAccess interface implementation

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->o_content);
    }

    public function offsetGet($offset)
    {
        $this->requireOffset($offset);
        return $this->o_content[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->o_content[] = $value;
        } else {
            $this->requireOffset($offset);
            $this->o_content[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        $this->requireOffset($offset);
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
        return $this->o_content[$this->o_position];
    }

    public function key()
    {
        return $this->o_position;
    }

    public function next()
    {
        ++$this->o_position;
    }

    public function rewind()
    {
        $this->o_position = 0;
    }

    public function valid()
    {
        return $this->offsetExists($this->o_position);
    }


    // Private helper method
    private function requireOffset($offset)
    {
        if (!$this->offsetExists($offset)) {
            throw new \InvalidArgumentException("Array index {$offset} out of bounds");
        }
    }
}