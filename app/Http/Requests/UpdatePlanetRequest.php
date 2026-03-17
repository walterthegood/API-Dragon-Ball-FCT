<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

class UpdatePlanetRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => 'sometimes|string|max:50|unique:planets,name,' . $this->route('planeta'),
        'isDestroyed' => 'sometimes|boolean',
        'description' => 'sometimes|string|max:50',
        'image' => 'sometimes|url',
        ];
    }
}
