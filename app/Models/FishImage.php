<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishImage extends Model
{
    protected $guarded = ['id'];

    protected $table = 'fish_images';

    public function fish()
    {
        return $this->belongsTo(Fish::class);
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
}
