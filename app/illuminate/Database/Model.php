<?php

namespace App\Illuminate\Database;

use App\Support\WorkWithSimpleData;

/**
 * Class Model
 * Simulate a Eloquent model.
 *
 * @package Illuminate
 */
class Model
{
    use WorkWithSimpleData;

    public function all(): array
    {
        return [];
    }

    public function where($a, $b): Model
    {
        return $this;
    }

    public function orderBy($order, $direction): Model
    {
        return $this;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function save(): bool
    {
        return true;
    }
}
