<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
  protected $fillable = ['name', 'isDestroyed', 'description'];

    public function characters() {
        return $this->hasMany(Character::class);
    }
}
