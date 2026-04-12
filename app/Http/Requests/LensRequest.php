<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LensRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shopkeeper_id' => 'required|exists:shopkeepers,shopkeeper_id',
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'color' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|max:100',
            'image_url' => 'nullable|url',
        ];
    }
}
