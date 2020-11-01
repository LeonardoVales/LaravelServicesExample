<?php

namespace App\Http\Controllers;

use App\Domains\Subscriptions\Services\CreateNewSubscription;
use App\Domains\Subscriptions\Services\CreateNewSubscriptionWithNewCustomer;
use App\Support\Validation\ValidationException;

class SubscriptionController
{
    public static function createNewSubscription(\stdClass $request)
    {
        try {
            $subscription = new CreateNewSubscription($request->customer_id, $request->plan_id);
            $subscription = $subscription->handle();
            response($subscription->toArray(), 201);
        } catch (ValidationException $e) {
            response($e->all(), 201);
        }
    }

    public static function createNewSubscriptionWithNewSubscriber(\stdClass $request)
    {
        try {
            $subscription = (new CreateNewSubscriptionWithNewCustomer(
                $request->customer,
                $request->plan_id
            ))->handle();

            response($subscription, 201);
        } catch (ValidationException $e) {
            response($e->all(), 201);
        }
    }
}
