<?php

namespace App\Http\Controllers;

use App\Domains\Subscriptions\Services\ListAllCustomers;
use App\Illuminate\Http\Request;
use App\Support\Validation\ValidationException;
use App\Domains\Subscriptions\Services\CreateNewCustomer;

class CustomerController
{
    public static function index(Request $request) : array
    {
        return (new ListAllCustomers(
            $request->status,
            $request->order,
            $request->orderDirection
        ))->handle();
    }

    public static function store(Request $request)
    {
        try {
            $customer = new CreateNewCustomer(
                $request->nome,
                $request->sobrenome,
                $request->email,
                $request->status,
            );
            $customer->handle();
        } catch (ValidationException $e) {
            return response($e->all(), 422);
        }

        return response(null, 201);
    }
}
