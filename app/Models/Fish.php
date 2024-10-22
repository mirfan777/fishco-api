<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    protected $guarded = ['id'];

    protected $table = 'fishes';

    public function medicines(){
            
            return $this->hasMany(Medicine::class);
    }

    public function aquariumfishes(){
            
            return $this->hasMany(AquariumFish::class); //kebalik sama penghuni fish maybe(?) harusnya belongsTo
    }
}
