<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopkeeperRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('shopkeeper');

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:shopkeepers,email,' . $id . ',shopkeeper_id',
            'phone' => 'required|string|max:15',
            'shop_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'password' => $id ? 'nullable|min:6' : 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Shopkeeper name is required.',
            'email.unique' => 'Email already exists.',
            'shop_name.required' => 'Shop name is required.',
        ];
    }
}
