<?php

namespace App\Services;

use App\Models\QrCode;

class QrCodeService
{
    public function all()
    {
        return QrCode::with(['shopkeeper', 'lens'])->latest()->get();
    }

    public function create(array $data): QrCode
    {
        return QrCode::create($data);
    }

    public function update(QrCode $qrCode, array $data): QrCode
    {
        $qrCode->update($data);
        return $qrCode;
    }

    public function delete(QrCode $qrCode): bool
    {
        return $qrCode->delete();
    }
}
