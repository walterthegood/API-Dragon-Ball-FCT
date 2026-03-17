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
            'name' => 'required|string|max:50|unique:characters,name',
            'ki' => 'required|string', 
            'maxKi' => 'required|string',
            'race' => 'required|string|max:20',
            'gender' => 'required|string',
            'description' => 'required|string|max:50',
            'image' => 'required|url',
            'affiliation' => 'required|string|max:10',

            'originPlanet' => 'required|array',

            // Exigimos TODOS los campos del planeta
            'originPlanet.name' => 'required|string|exists:planets,name',
            'originPlanet.isDestroyed' => 'required|boolean',
            'originPlanet.description' => 'required|string',
            'originPlanet.image' => 'required|url',

            'transformations' => 'sometimes|array', 
            'transformations.*.name' => 'required|string|exists:transformations,name',
            'transformations.*.image' => 'required|url',
            'transformations.*.ki' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'EL NOMBRE DEL PERSONAJE YA EXISTE',
            'planet_name.exists' => 'NOMBRE DE PLANETA INVALIDO',
            'transformations.*.name.exists' => 'NOMBRE DE TRANSFORMACION NO VALIDA',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            response()->json([
                'message' => 'Errores de validación',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
