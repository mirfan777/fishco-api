<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $guarded = ['id']; 

    public function disease()
    {
        return $this->hasMany(Medicine::class);
    }
}