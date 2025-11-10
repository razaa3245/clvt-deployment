<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'shop_name' => 'nullable|string|max:255',
            'address'=> 'required|string|max:255',
            'retailer_name'=> 'nullable',
            'phone' => 'nullable|string|max:20',
        ];
    }
}
