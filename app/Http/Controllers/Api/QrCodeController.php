<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QrCodeRequest;
use App\Http\Resources\QrCodeResource;
use App\Models\QrCode;
use App\Services\QrCodeService;

class QrCodeController extends Controller
{
    protected $service;

    public function __construct(QrCodeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return QrCodeResource::collection(QrCode::latest()->get());
    }

    public function store(QrCodeRequest $request)
    {
        $qrCode = $this->service->create($request->validated());
        return new QrCodeResource($qrCode);
    }

    public function show(QrCode $qrCode)
    {
        return new QrCodeResource($qrCode);
    }

    public function update(QrCodeRequest $request, QrCode $qrCode)
    {
        $qrCode = $this->service->update($qrCode, $request->validated());
        return new QrCodeResource($qrCode);
    }

    public function destroy(QrCode $qrCode)
    {
        $qrCode->delete();
        return response()->json(['message' => 'QR Code deleted successfully']);
    }
}
