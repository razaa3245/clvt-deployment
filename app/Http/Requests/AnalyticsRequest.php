<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnalyticsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shopkeeper_id' => 'required|exists:shopkeepers,shopkeeper_id',
            'views' => 'required|integer|min:0',
            'clicks' => 'required|integer|min:0',
            'sales' => 'required|integer|min:0',
            'date' => 'required|date',
        ];
    }
}
