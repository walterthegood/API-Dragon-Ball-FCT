<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transformation extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'ki', 'image', 'character_id'];

    public function character() {
        return $this->belongsTo(Character::class);
    }
}
