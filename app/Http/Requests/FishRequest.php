<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FishRequest extends FormRequest
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
            'kingdom' => 'required|string|max:255',
            'phylum' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'order' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'genus' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'colour' => 'required|string|max:255',
            'food_type' => 'required|string|max:255',
            'food' => 'required|string|max:255',
            'min_temperature' => 'required|numeric',
            'max_temperature' => 'required|numeric',
            'min_ph' => 'required|numeric',
            'max_ph' => 'required|numeric',
            'min_salinity' => 'required|numeric',
            'max_salinity' => 'required|numeric',
            'habitat' => 'required|string|max:255',
            'overview' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'average_size' => 'required|string|max:255',
        ];
    }
}
