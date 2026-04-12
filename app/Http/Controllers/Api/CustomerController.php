<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    protected $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json(CustomerResource::collection($this->service->all()));
    }

    public function store(CustomerRequest $request): JsonResponse
    {
        $customer = $this->service->create($request->validated());
        return response()->json(new CustomerResource($customer), 201);
    }

    public function show($id): JsonResponse
    {
        $customer = $this->service->all()->find($id);
        return $customer ? response()->json(new CustomerResource($customer)) : response()->json(['message' => 'Customer not found'], 404);
    }

    public function update(CustomerRequest $request, $id): JsonResponse
    {
        $customer = $this->service->all()->find($id);
        if (!$customer) return response()->json(['message' => 'Customer not found'], 404);
        $this->service->update($customer, $request->validated());
        return response()->json(new CustomerResource($customer));
    }

    public function destroy($id): JsonResponse
    {
        $customer = $this->service->all()->find($id);
        if (!$customer) return response()->json(['message' => 'Customer not found'], 404);
        $this->service->delete($customer);
        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
