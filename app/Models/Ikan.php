<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    protected $guarded = ['id'];

    public function pengobatan(){
            
            return $this->hasMany(Pengobatan::class);
    }

    public function penghuni_ikan(){
            
            return $this->hasMany(Penghuni_ikan::class); //kebalik sama penghuni ikan maybe(?) harusnya belongsTo
    }
}
