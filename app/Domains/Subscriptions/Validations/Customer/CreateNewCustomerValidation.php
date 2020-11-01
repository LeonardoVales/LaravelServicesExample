<?php

namespace App\Domains\Subscriptions\Validations\Customer;

use App\Support\Validation\Validation;

class CreateNewCustomerValidation extends Validation
{

    protected function rules(): array
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:customers,email',
            'status' => [
                'required',
                'in:ACTIVE,INACTIVE', // real use: Rule::in(...)
            ]
        ];
    }

    protected function messages(): array
    {
        return [];
    }
}
