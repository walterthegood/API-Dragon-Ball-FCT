<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCharacterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'ki' => 'required|string', 
            'maxKi' => 'required|string',
            'race' => 'required|string|max:20',
            'gender' => 'required|string',
            'description' => 'required|string|max:50',
            'image' => 'required|url',
            'affiliation' => 'required|string|max:10',

            'planet_name' => 'required|string|exists:planets,name',
            'transformations' => 'sometimes|array',

            'transformations.*.name' => 'required|string|exists:transformations,name',
            'transformations.*.image' => 'required|url',
            'transformations.*.ki' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'planet_name.exists' => 'NOMBRE DE PLANETA INVALIDO',
            'transformations.*.name.exists' => 'NOMBRE DE TRANSFORMACION NO VALIDA',
        ];
    }
}
