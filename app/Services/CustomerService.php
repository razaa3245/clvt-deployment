<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function all()
    {
        return Customer::with('tryOns')->latest()->get();
    }

    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function update(Customer $customer, array $data): Customer
    {
        $customer->update($data);
        return $customer;
    }

    public function delete(Customer $customer): bool
    {
        return $customer->delete();
    }
}
