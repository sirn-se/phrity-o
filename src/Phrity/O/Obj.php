<?php

namespace Phrity\O;

class Obj
{
    protected $o_content;

    public function __construct(...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        if (is_null($content)) {
            $this->o_content = new \stdclass;
        } elseif (is_array($content)) {
            $this->o_content = (object)$content;
        } elseif (is_object($content)) {
            $this->o_content = (object)$content;
        } elseif ($content instanceof self) {
            $this->o_content = $content->o_content;
        } else {
            throw new \InvalidArgumentException('Unsupported argument for O\Obj');
        }
        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Obj');
        }
    }


    // Property access methods

    public function __get($key)
    {
      return $this->o_content->$key;
    }

    public function __set($key, $value)
    {
      $this->o_content->$key = $value;
    }

    public function __isset($key)
    {
      return isset($this->o_content->$key);
    }

    public function __unset($key)
    {
      unset($this->o_content->$key);
    }


    // String representation methods

    public function __toString()
    {
      return self::class;
    }

}
