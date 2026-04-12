<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    public function all()
    {
        return Admin::latest()->get();
    }

    public function create(array $data): Admin
    {
        $data['password'] = Hash::make($data['password']);
        return Admin::create($data);
    }

    public function update(Admin $admin, array $data): Admin
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $admin->update($data);
        return $admin;
    }

    public function delete(Admin $admin): bool
    {
        return $admin->delete();
    }
}
