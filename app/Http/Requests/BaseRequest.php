<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    /**
     * Por defecto, autorizamos todas las peticiones.
     * Si necesitas lógica de roles, puedes sobrescribirlo en el hijo.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * El "Escudo" que convierte errores de redirección en JSON.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Errores de validación',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}