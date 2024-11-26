<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\FishResource;
use App\Http\Resources\AffectedFishResource;
use App\Http\Resources\ProductRecommendationTreatmentResource;

class DiseaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    // public static $wrap = null;

    public function toArray(Request $request): array
    {
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'disease_type' => $this->disease_type,
            'cause_agent' => $this->cause_agent,
            'affected_part' => $this->affected_part,
            'description' => $this->description,
            'symptoms' => $this->symptoms,
            'prevention' => $this->prevention,
            'note' => $this->note,
            'affected_fish' => $this->affected_fish->map(function ($fish) {
                return [
                    'id' => $fish->id,
                    'name' => $fish->name,
                ];
            }),
            'products_recommendation' => ProductResource::collection($this->product_recommendation),
            'created_at' => $this->created_at
        ];
    }
}
