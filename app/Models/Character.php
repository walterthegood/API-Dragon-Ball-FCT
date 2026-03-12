<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = 
    [
        'name', 
        'ki', 
        'maxKi', 
        'race', 
        'gender', 
        'description', 
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
