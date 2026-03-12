<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    protected $fillable = [
        'nombre',
        'raza',
        'ki',
        'ki_maximo',
        'descripcion',
        'imagen',
        'afiliacion',
        'planeta_id',
    ];

    public function planeta()
    {
        return $this->belongsTo(Planeta::class);
    }
}
