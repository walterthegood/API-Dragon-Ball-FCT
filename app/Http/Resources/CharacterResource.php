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
            'image' => $this->image ?? 'RELLENA CON TU URL',
            'affiliation' => $this->affiliation,
            'deletedAt' => $this->deleted_at,
            
            'originPlanet' => [
                'id' => $this->planet->id,
                'name' => $this->planet->name,
                'isDestroyed' => (bool) $this->planet->isDestroyed, 
                'image' => $this->planet->image ?? 'RELLENA CON TU URL',
                'description' => $this->planet->description,
                'deletedAt' => $this->planet->deleted_at,
            ],

            'transformations' => $this->transformations->map(function ($transformacion) {
                return [
                    'id' => $transformacion->id,
                    'name' => $transformacion->name,
                    'image' => $transformacion->image ?? 'RELLENA CON TU URL',
                    'ki' => (string) $transformacion->ki,
                    'deletedAt' => $transformacion->deleted_at,
                ];
            })
        ];
    }
}
