<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LensRequest;
use App\Http\Resources\LensResource;
use App\Services\LensService;
use Illuminate\Http\JsonResponse;

class LensController extends Controller
{
    protected $service;

    public function __construct(LensService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json(LensResource::collection($this->service->all()));
    }

    public function store(LensRequest $request): JsonResponse
    {
        $lens = $this->service->create($request->validated());
        return response()->json(new LensResource($lens), 201);
    }

    public function show($id): JsonResponse
    {
        $lens = $this->service->all()->find($id);
        return $lens ? response()->json(new LensResource($lens)) : response()->json(['message' => 'Lens not found'], 404);
    }

    public function update(LensRequest $request, $id): JsonResponse
    {
        $lens = $this->service->all()->find($id);
        if (!$lens) return response()->json(['message' => 'Lens not found'], 404);
        $this->service->update($lens, $request->validated());
        return response()->json(new LensResource($lens));
    }

    public function destroy($id): JsonResponse
    {
        $lens = $this->service->all()->find($id);
        if (!$lens) return response()->json(['message' => 'Lens not found'], 404);
        $this->service->delete($lens);
        return response()->json(['message' => 'Lens deleted successfully']);
    }
}
