<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aquarium extends Model
{
    protected $table = 'aquariums';

    protected $guarded = ['id'];

    public function aquariumfishes()
    {
        return $this->hasMany(AquariumFish::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
