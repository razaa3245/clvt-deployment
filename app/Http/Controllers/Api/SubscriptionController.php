<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    protected $service;

    public function __construct(SubscriptionService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return SubscriptionResource::collection(Subscription::latest()->get());
    }

    public function store(SubscriptionRequest $request)
    {
        $subscription = $this->service->create($request->validated());
        return new SubscriptionResource($subscription);
    }

    public function show(Subscription $subscription)
    {
        return new SubscriptionResource($subscription);
    }

    public function update(SubscriptionRequest $request, Subscription $subscription)
    {
        $subscription = $this->service->update($subscription, $request->validated());
        return new SubscriptionResource($subscription);
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return response()->json(['message' => 'Subscription deleted successfully']);
    }
}
