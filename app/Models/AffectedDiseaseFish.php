<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Fish;
use App\Models\Disease;

class AffectedDiseaseFish extends Model
{
    protected $table = 'affected_disease_fish';

    protected $guarded = ['id'];

    public function fishes(): HasMany
    {
        return $this->hasMany(Fish::class);
    }

    public function diseases(): HasMany
    {
        return $this->hasMany(Disease::class);
    }
}
