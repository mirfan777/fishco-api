<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    
    protected $guarded = ['id'];

    public function affiliate(){
        return $this->hasOne(Affiliate::class);
    }
}
