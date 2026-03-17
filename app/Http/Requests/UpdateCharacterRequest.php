<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
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
            'name' => 'sometimes|string|max:50|unique:characters,name,',
            'ki' => 'sometimes|string', 
            'maxKi' => 'sometimes|string',
            'race' => 'sometimes|string|max:20',
            'gender' => 'sometimes|string',
            'description' => 'sometimes|string|max:50',
            'image' => 'sometimes|url',
            'affiliation' => 'sometimes|string|max:10',

            //Actualizar el planeta si quieren hacerlo 
            'originPlanet' => 'sometimes|array',

            'originPlanet.name' => 'required_with:originPlanet|string|exists:planets,name',
            'originPlanet.isDestroyed' => 'required_with:originPlanet|boolean',
            'originPlanet.description' => 'required_with:originPlanet|string',
            'originPlanet.image' => 'required_with:originPlanet|url',

            //Actualizar las transformaciones si quieren hacerlo
            'transformations' => 'sometimes|array',
            'transformations.*.name' => 'required_with:transformations|string|exists:transformations,name',
            'transformations.*.image' => 'required_with:transformations|url',
            'transformations.*.ki' => 'required_with:transformations|string',

        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'ESTE PERSONAJE YA EXISTE EN EL UNIVERSO',
            'originPlanet.name.exists' => 'NOMBRE DE PLANETA INVALIDO',
            'transformations.*.name.exists' => 'NOMBRE DE TRANSFORMACION NO VALIDA',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            response()->json([
                'message' => 'Errores de validación en la actualización',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
