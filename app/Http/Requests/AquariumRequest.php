<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AquariumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'volume' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'material' => 'required|string',
            'type' => 'required|string',
            'filter_type' => 'required|string',
            'filter_capacity' => 'required|numeric',
            'filter_media' => 'required|string',
            'min_temperature' => 'required|numeric',
            'max_temperature' => 'required|numeric',
            'min_ph' => 'required|numeric',
            'max_ph' => 'required|numeric',
            'turbidity' => 'required|string',
            'salitity' => 'required|string',
            'dissolved_oxygen' => 'required|string',
            'hardness' => 'required|string',
            'ammonia' => 'required|string',
            'nitrite' => 'required|string',
            'nitrate' => 'required|string',
        ];
    }
}
