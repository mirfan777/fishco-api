<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;
use App\Models\Disease;

class ProductTreatmentRecommendation extends Model
{
    protected $table = 'product_treatment_recommendations';

    protected $guarded = ['id'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function diseases(): HasMany
    {
        return $this->hasMany(Disease::class);
    }
}
