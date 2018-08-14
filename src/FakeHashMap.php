<?php

declare(strict_types=1);

namespace Money;

class FakeHashMap extends \ArrayObject
{
    public function put($key, $value)
    {
        $this->offsetSet($key, $value);
    }

    public function get($key)
    {
        return $this->offsetGet($key);
    }
}
