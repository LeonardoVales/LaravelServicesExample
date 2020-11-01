<?php

namespace App\Support;

trait WorkWithSimpleData
{
    protected array $data;


    public function has($property): ?bool
    {
        return $this->data[$property] ? true : null;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function __get($property)
    {
        return $this->data[$property] ?? null;
    }

    public function __set($property, $value)
    {
        $this->data[$property] = $value;
    }

    public function __isset($data)
    {
        return $this->has($data);
    }
}