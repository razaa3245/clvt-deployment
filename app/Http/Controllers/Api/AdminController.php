<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Resources\AdminResource;
use App\Services\AdminService;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    protected $service;

    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json(AdminResource::collection($this->service->all()));
    }

    public function store(AdminRequest $request): JsonResponse
    {
        $admin = $this->service->create($request->validated());
        return response()->json(new AdminResource($admin), 201);
    }

    public function show($id): JsonResponse
    {
        $admin = $this->service->all()->find($id);
        return $admin ? response()->json(new AdminResource($admin)) : response()->json(['message' => 'Admin not found'], 404);
    }

    public function update(AdminRequest $request, $id): JsonResponse
    {
        $admin = $this->service->all()->find($id);
        if (!$admin) return response()->json(['message' => 'Admin not found'], 404);
        $this->service->update($admin, $request->validated());
        return response()->json(new AdminResource($admin));
    }

    public function destroy($id): JsonResponse
    {
        $admin = $this->service->all()->find($id);
        if (!$admin) return response()->json(['message' => 'Admin not found'], 404);
        $this->service->delete($admin);
        return response()->json(['message' => 'Admin deleted successfully']);
    }
}
