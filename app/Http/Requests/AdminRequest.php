<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('admin');

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id . ',admin_id',
            'password' => $id ? 'nullable|min:6' : 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the admin name.',
            'email.required' => 'Email address is required.',
            'password.required' => 'Password is required.',
        ];
    }
}
