<?php

namespace App\Domains\Subscriptions\Services;

use App\Support\Services\ServiceInterface;
use App\Support\Validation\ValidationException;

class CreateNewSubscriptionWithNewCustomer implements ServiceInterface
{
    private array $customer;
    private ?int $planId;

    /**
     * Create a enw subscription with new Customer too.
     *
     * @param array    $customer
     * @param int|null $planId
     */
    public function __construct(array $customer = [], int $planId = null)
    {
        $this->customer = $customer;
        $this->planId = $planId;
    }

    /**
     * @return array
     * @throws ValidationException
     */
    public function handle(): array
    {
        $customer = (new CreateNewCustomer(
            $this->customer['name'],
            $this->customer['lastname'],
            $this->customer['email'],
            $this->customer['status']
        ))->handle();

        return (new CreateNewSubscription(
            $customer->id,
            $this->planId
        ))->handle();
    }
}
