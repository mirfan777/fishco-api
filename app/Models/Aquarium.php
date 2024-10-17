<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aquarium extends Model
{
    protected $guarded = ['id'];

    public function penghuni_ikan()
    {
        return $this->hasMany(Penghuni_ikan::class);
    }

    
}
