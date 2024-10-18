<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AquariumFish extends Model
{
    protected $guarded = ['id'];

    public function fish()
    {
        return $this->belongsTo(Fish::class);
    }

    public function aquarium()
    {
        return $this->belongsTo(Aquarium::class);
    }
}
