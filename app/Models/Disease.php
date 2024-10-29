<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $table = 'diseases';
    
    protected $guarded = ['id']; 

    public function medicine()
    {
        return $this->hasMany(Medicine::class);
    }

    public function fish()
    {
        return $this->hasOne(FishImage::class);
    }
}
