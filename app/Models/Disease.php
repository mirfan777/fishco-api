<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\AffectedDiseaseFish;
use App\Models\Fish;
use App\Models\ProductTreatmentRecommendation;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Disease extends Model
{
    protected $table = 'diseases';
    
    protected $guarded = ['id']; 


    public function product_recommendation()
    {
        return $this->belongstoMany(Product::class, 'product_treatment_recommendations', 'disease_id', 'product_id');
    }

    public function affected_fish()
    {
        return $this->belongsToMany(Fish::class, 'affected_disease_fish', 'disease_id', 'fish_id');
    }
}
