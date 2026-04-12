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
            'address' => 'nullable|string|max:255',
            'retailer_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'security_question1' => 'required|string|max:255',
            'security_answer1' => 'required|string|max:255',
            'security_question2' => 'required|string|max:255',
            'security_answer2' => 'required|string|max:255',
            'security_question3' => 'required|string|max:255',
            'security_answer3' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'A user with that email already exists. Please use a different email or log in.',
        ];
    }
}
