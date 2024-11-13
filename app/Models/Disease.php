<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\AffectedDiseaseFish;

class Disease extends Model
{
    protected $table = 'diseases';
    
    protected $guarded = ['id']; 


    public function product_recommendation()
    {
        return $this->hasMany(ProductTreatmentRecommendation::class);
    }

    public function affected_fish()
    {
        return $this->hasMany(AffectedDiseaseFish::class);
    }
}
