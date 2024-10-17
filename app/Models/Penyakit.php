<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $guarded = ['id']; 

    public function pengobatan()
    {
        return $this->hasMany(Pengobatan::class);
    }
}
