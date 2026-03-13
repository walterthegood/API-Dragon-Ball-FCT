<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Planet extends Model
{
  use SoftDeletes;
  protected $fillable = ['name', 'isDestroyed', 'image' ,'description'];

    public function characters() {
        return $this->hasMany(Character::class);
    }
}
