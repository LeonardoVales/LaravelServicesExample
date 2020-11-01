<?php

namespace App\Support\Validation;

use Throwable;

class ValidationException extends \Exception
{
    private array $errors;

    public function __construct(array $errors)
    {
        parent::__construct("Validation Error");

        $this->errors = $errors;
    }

    public function all(): array
    {
        return $this->errors;
    }
}
