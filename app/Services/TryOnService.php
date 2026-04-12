<?php

namespace App\Services;

use App\Models\TryOn;

class TryOnService
{
    public function all()
    {
        return TryOn::with(['customer', 'lens'])->latest()->get();
    }

    public function create(array $data): TryOn
    {
        return TryOn::create($data);
    }

    public function update(TryOn $tryOn, array $data): TryOn
    {
        $tryOn->update($data);
        return $tryOn;
    }

    public function delete(TryOn $tryOn): bool
    {
        return $tryOn->delete();
    }
}
