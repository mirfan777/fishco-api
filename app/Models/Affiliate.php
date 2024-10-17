<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasOne(Products::class);
    }
}
