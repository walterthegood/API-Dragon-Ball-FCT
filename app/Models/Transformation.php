<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    protected $fillable = ['name', 'ki', 'character_id'];

    public function character() {
        return $this->belongsTo(Character::class);
    }
}
