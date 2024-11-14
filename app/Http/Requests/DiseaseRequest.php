<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiseaseRequest extends FormRequest
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
            'description' => 'required|string',
            'disease_type' => 'required|integer',
            'cause_agent' => 'required|string|max:255',
            'affected_part' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'prevention' => 'required|string|max:255',
            'note' => 'required|string|max:255',
        ];
    }
}
