<?php

namespace App\Domains\Subscriptions\Services;

use App\Domains\Subscriptions\Entities\Subscription;

class CreateNewSubscription
{
    /**
     * @var int
     */
    private int $customerId;
    /**
     * @var int
     */
    private int $planId;

    /**
     * Create a new subscription constructor.
     *
     * @param $customerId
     * @param $planId
     */
    public function __construct(int $customerId, int $planId)
    {
        $this->customerId = $customerId;
        $this->planId = $planId;
    }

    public function handle()
    {
        // validate...
        // ...

        // Begin transaction...
        $subscription = new Subscription();
        $subscription->customer_id = $this->customerId;
        $subscription->plan_id = $this->planId;
        $subscription->save();
        // end transaction...

        // Trigger a event to do some other thing...
        //event(new SubscriptionCreated($subscription));

        return $subscription->toArray();
    }
}
