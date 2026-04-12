<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TryOnRequest;
use App\Http\Resources\TryOnResource;
use App\Services\TryOnService;
use Illuminate\Http\JsonResponse;

class TryOnController extends Controller
{
    protected $service;

    public function __construct(TryOnService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json(TryOnResource::collection($this->service->all()));
    }

    public function store(TryOnRequest $request): JsonResponse
    {
        $tryOn = $this->service->create($request->validated());
        return response()->json(new TryOnResource($tryOn), 201);
    }

    public function show($id): JsonResponse
    {
        $tryOn = $this->service->all()->find($id);
        return $tryOn ? response()->json(new TryOnResource($tryOn)) : response()->json(['message' => 'TryOn not found'], 404);
    }

    public function update(TryOnRequest $request, $id): JsonResponse
    {
        $tryOn = $this->service->all()->find($id);
        if (!$tryOn) return response()->json(['message' => 'TryOn not found'], 404);
        $this->service->update($tryOn, $request->validated());
        return response()->json(new TryOnResource($tryOn));
    }

    public function destroy($id): JsonResponse
    {
        $tryOn = $this->service->all()->find($id);
        if (!$tryOn) return response()->json(['message' => 'TryOn not found'], 404);
        $this->service->delete($tryOn);
        return response()->json(['message' => 'TryOn deleted successfully']);
    }
}
