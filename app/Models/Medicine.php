<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicines';
    
    protected $guarded = ['id'];

    public function fish()
    {
        return $this->belongsTo(Fish::class);
    }

    public function disease(){
        
        return $this->belongsTo(Disease::class);
    }
}
