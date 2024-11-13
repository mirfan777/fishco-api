<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\FishResource;

class DiseaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
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
            'product_recommendation' => new ProductResource($this->product_recommendation),
            'affected_fish' => new FishResource($this->affected_fish),
            'created_at' => $this->created_at
        ];
    }
}
