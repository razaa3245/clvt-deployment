<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopkeeperRequest;
use App\Http\Resources\ShopkeeperResource;
use App\Services\ShopkeeperService;
use Illuminate\Http\JsonResponse;

class ShopkeeperController extends Controller
{
    protected $service;

    public function __construct(ShopkeeperService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json(ShopkeeperResource::collection($this->service->all()));
    }

    public function store(ShopkeeperRequest $request): JsonResponse
    {
        $shopkeeper = $this->service->create($request->validated());
        return response()->json(new ShopkeeperResource($shopkeeper), 201);
    }

    public function show($id): JsonResponse
    {
        $shopkeeper = $this->service->all()->find($id);
        return $shopkeeper ? response()->json(new ShopkeeperResource($shopkeeper)) : response()->json(['message' => 'Shopkeeper not found'], 404);
    }

    public function update(ShopkeeperRequest $request, $id): JsonResponse
    {
        $shopkeeper = $this->service->all()->find($id);
        if (!$shopkeeper) return response()->json(['message' => 'Shopkeeper not found'], 404);
        $this->service->update($shopkeeper, $request->validated());
        return response()->json(new ShopkeeperResource($shopkeeper));
    }

    public function destroy($id): JsonResponse
    {
        $shopkeeper = $this->service->all()->find($id);
        if (!$shopkeeper) return response()->json(['message' => 'Shopkeeper not found'], 404);
        $this->service->delete($shopkeeper);
        return response()->json(['message' => 'Shopkeeper deleted successfully']);
    }
}
