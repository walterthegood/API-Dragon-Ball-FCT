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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:50',
            'ki' => 'sometimes|string', 
            'maxKi' => 'sometimes|string',
            'race' => 'sometimes|string|max:20',
            'gender' => 'sometimes|string',
            'description' => 'sometimes|string|max:50',
            'image' => 'sometimes|url',
            'affiliation' => 'sometimes|string|max:10',
            'planet_id' => 'sometimes|exists:planets,id',
        ];
    }
}
