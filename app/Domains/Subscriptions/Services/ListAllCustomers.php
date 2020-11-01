<?php

namespace App\Domains\Subscriptions\Services;

use App\Domains\Subscriptions\Entities\Customer;
use App\Support\Services\ServiceInterface;

class ListAllCustomers implements ServiceInterface
{
    /**
     * @var string|null
     */
    protected ?string $status;
    /**
     * @var string|null
     */
    protected ?string $order;
    /**
     * @var string|null
     */
    protected ?string $orderDirection;

    /**
     * List all customer constructor.
     *
     * @param string|null $status
     * @param string|null $order
     * @param string|null $orderDirection
     */
    public function __construct(string $status = null, string $order = null, string $orderDirection = null)
    {
        $this->status = $status;
        $this->order = $order;
        $this->orderDirection = $orderDirection;
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        $customer = new Customer();

        if (! is_null($this->status)) {
            $customer->where('status', $this->status);
        }

        if (! (is_null($this->order) && is_null($this->orderDirection))) {
            $customer->orderBy($this->order, $this->orderDirection);
        }
        
        return $customer->all();
    }
}
