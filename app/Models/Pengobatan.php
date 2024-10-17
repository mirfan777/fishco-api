<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengobatan extends Model
{
    protected $guarded = ['id'];

    public function ikan()
    {
        return $this->belongsTo(Ikan::class);
    }

    public function penyakit(){
        
        return $this->belongsTo(Penyakit::class);
    }
}
