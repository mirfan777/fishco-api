<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghuni_ikan extends Model
{
    protected $guarded = ['id'];

    public function ikan()
    {
        return $this->belongsTo(Ikan::class);
    }

    public function aquarium()
    {
        return $this->belongsTo(Aquarium::class);
    }
}
