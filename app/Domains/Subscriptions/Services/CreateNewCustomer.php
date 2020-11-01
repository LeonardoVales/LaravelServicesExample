<?php

namespace App\Domains\Subscriptions\Services;

use App\Domains\Subscriptions\Validations\Customer\CreateNewCustomerValidation;
use App\Domains\Subscriptions\Entities\Customer;
use App\Support\Services\ServiceInterface;
use App\Support\Validation\ValidationException;

class CreateNewCustomer implements ServiceInterface
{
    private ?string $name;
    private ?string $lastname;
    private ?string $email;
    private ?string $status;

    /**
     * CreateNewCustomer constructor.
     *
     * TIP:
     *  Setting up all variable as null allow you to treat it in Validation layer.
     *  on this way, you doesn't have anyone problem with data origin passed to the args.
     *
     *  That means that, you can pass value from a array (with non existing key, by example) or
     *  from a magic property from a request, etc.
     *
     * @param string|null $name
     * @param string|null $lastname
     * @param string|null $email
     * @param string|null $status
     */
    public function __construct(
        string $name = null,
        string $lastname = null,
        string $email = null,
        string $status = null
    ) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->status = $status;
    }

    /**
     * @return array
     *
     * @throws ValidationException
     */
    public function handle(): array
    {
        $data = [
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'status' => $this->status
        ];

        // Validate...
        (new CreateNewCustomerValidation($data))->validate();

        // store...
        $customer = new Customer();
        $customer->name = $this->name;
        $customer->lastname = $this->lastname;
        $customer->email = $this->email;
        // we can create a ValueObject to work with the customer status.
        $customer->status = Customer::$status[$this->status];
        $customer->save();

        // trigger a event when a new customer was created...
        // event(new NewCustomerCreated($customer));

        // grants that a array will be returned instead of a Model instance.
        // After creation of the new customer, what you need, a Model instance or the model data?
        // Probably you will need the data.
        return $customer->toArray();
    }
}
