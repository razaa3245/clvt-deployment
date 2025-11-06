<?php

namespace App\Services;

use App\Models\Lens;

class LensService
{
    public function all()
    {
        return Lens::with('shopkeeper')->latest()->get();
    }

    public function create(array $data): Lens
    {
        return Lens::create($data);
    }

    public function update(Lens $lens, array $data): Lens
    {
        $lens->update($data);
        return $lens;
    }

    public function delete(Lens $lens): bool
    {
        return $lens->delete();
    }
}
