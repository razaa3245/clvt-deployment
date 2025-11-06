<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QrCodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shopkeeper_id' => 'required|exists:shopkeepers,shopkeeper_id',
            'lens_id' => 'required|exists:lenses,lens_id',
            'qr_image' => 'required|url',
        ];
    }
}
