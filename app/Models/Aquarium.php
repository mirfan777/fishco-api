<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aquarium extends Model
{
    protected $guarded = ['id'];

    public function aquariumfishes()
    {
        return $this->hasMany(AquariumFish::class);
    }

    
}
