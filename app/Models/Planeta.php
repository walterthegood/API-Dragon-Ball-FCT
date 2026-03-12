<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planeta extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'destruido',
        'imagen',
    ];

    protected $casts = [
        'destruido' => 'boolean',
    ];

    public function personajes()
    {
        return $this->hasMany(Personaje::class);
    }
}
