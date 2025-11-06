<?php

namespace App\Services;

use App\Models\Shopkeeper;
use Illuminate\Support\Facades\Hash;

class ShopkeeperService
{
    public function all()
    {
        return Shopkeeper::with('subscriptions', 'analytics')->latest()->get();
    }

    public function create(array $data): Shopkeeper
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return Shopkeeper::create($data);
    }

    public function update(Shopkeeper $shopkeeper, array $data): Shopkeeper
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $shopkeeper->update($data);
        return $shopkeeper;
    }

    public function delete(Shopkeeper $shopkeeper): bool
    {
        return $shopkeeper->delete();
    }
}
