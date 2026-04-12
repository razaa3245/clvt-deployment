<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnalyticsRequest;
use App\Http\Resources\AnalyticsResource;
use App\Models\Analytics;
use App\Services\AnalyticsService;

class AnalyticsController extends Controller
{
    protected $service;

    public function __construct(AnalyticsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return AnalyticsResource::collection(Analytics::latest()->get());
    }

    public function store(AnalyticsRequest $request)
    {
        $analytics = $this->service->create($request->validated());
        return new AnalyticsResource($analytics);
    }

    public function show(Analytics $analytics)
    {
        return new AnalyticsResource($analytics);
    }

    public function update(AnalyticsRequest $request, Analytics $analytics)
    {
        $analytics = $this->service->update($analytics, $request->validated());
        return new AnalyticsResource($analytics);
    }

    public function destroy(Analytics $analytics)
    {
        $analytics->delete();
        return response()->json(['message' => 'Analytics record deleted successfully']);
    }
}
