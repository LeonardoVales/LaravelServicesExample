<?php

declare(strict_types=1);

namespace App\Support\Validation;

abstract class Validation
{
    /**
     * @var array
     */
    private array $data;

    /**
     * Define data to be validated.
     *
     * @param  array $data
     * @return void
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Define all rules that will be used to validate the data.
     *
     * @return array
     */
    abstract protected function rules() : array;

    /**
     * Define messages to validation rules.
     *
     * @return array
     */
    abstract protected function messages() : array;

    /**
     * @throws ValidationException
     */
    public function validate(): void
    {
        $validation = validator($this->data, $this->rules(), $this->messages());

        if ($validation->fails()) {
            throw new ValidationException($validation->errors());
        }
    }
}
