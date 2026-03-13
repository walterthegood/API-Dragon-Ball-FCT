<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use SoftDeletes;
    protected $fillable = 
    [
        'name', 
        'ki', 
        'maxKi', 
        'race', 
        'gender', 
        'description', 
        'image',
        'affiliation', 
        'planet_id'
    ];

    public function planet() {
        return $this->belongsTo(Planet::class);
    }

    public function transformations() {
        return $this->hasMany(Transformation::class);
    }

}
