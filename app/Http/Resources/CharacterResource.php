<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'ki' => $this->ki,
            'maxKi' => $this->maxKi,
            'race' => $this->race,
            'gender' => $this->gender,
            'description' => $this->description,
            'affiliation' => $this->affiliation,
            
            'originPlanet' => [
                'id' => $this->planet->id,
                'name' => $this->planet->name,
                'isDestroyed' => (bool) $this->planet->isDestroyed, 
                'description' => $this->planet->description,
            ],

            'transformations' => $this->transformations->map(function ($transformacion) {
                return [
                    'id' => $transformacion->id,
                    'name' => $transformacion->name,
                    'ki' => (string) $transformacion->ki 
                ];
            })
        ];
    }
}
