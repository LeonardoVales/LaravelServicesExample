<?php

namespace App\Support\Validation;

class Validator
{
    public function fails(): bool
    {
        return true;
    }

    public function errors(): array
    {
        return [];
    }
}
