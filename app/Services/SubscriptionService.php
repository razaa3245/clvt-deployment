<?php

namespace App\Services;

use App\Models\Subscription;

class SubscriptionService
{
    public function all()
    {
        return Subscription::with('shopkeeper')->latest()->get();
    }

    public function create(array $data): Subscription
    {
        return Subscription::create($data);
    }

    public function update(Subscription $subscription, array $data): Subscription
    {
        $subscription->update($data);
        return $subscription;
    }

    public function delete(Subscription $subscription): bool
    {
        return $subscription->delete();
    }
}
