<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('customer');

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id . ',customer_id',
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female,other',
            'dob' => 'nullable|date',
            'password' => $id ? 'nullable|min:6' : 'required|min:6',
        ];
    }
}
