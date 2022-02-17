<?php

namespace App;


trait SetAndGet
{
    public function __set(string $name, array $value)
    {
        $this->data[$name] = $value;
    }

    public function __get(string $name)
    {
        return $this->data[$name];
    }

    public function __isset(string $name)
    {
        return isset($this->data[$name]);
    }
}
