<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

class StorePlanetRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [    
            'name' => 'required|string|max:50|unique:planets,name',
            'isDestroyed' => 'required|boolean',
            'description' => 'required|string|max:50',
            'image' => 'required|url',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de este campo es obligatorio.',
            'name.string' => 'El nombre debe ser un String.',
            'name.max' => 'El nombre no debe ser mayor a 50 caracteres.',
            'name.unique' => 'Ese nombre ya existe.',
            'isDestroyed.required' => 'El campo isDestroyed es obligatorio.',
            'isDestroyed.boolean' => 'El campo isDestroyed debe ser true o false.',
            'description.required' => 'El campo description es obligatorio.',
            'description.string' => 'El campo description debe ser un string.',
            'description.max' => 'El description no debe ser mayor a 50 caracteres.',
            'image.required' => 'El campo image es obligatorio.',
            'image.url' => 'El campo image debe ser una URL válida.',
        ];
    }
}
