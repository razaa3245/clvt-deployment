<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TryOnRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,customer_id',
            'lens_id' => 'required|exists:lenses,lens_id',
            'image_url' => 'nullable|url',
            'status' => 'required|in:pending,completed,failed',
        ];
    }
}
