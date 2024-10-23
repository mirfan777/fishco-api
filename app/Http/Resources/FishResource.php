<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FishResource extends JsonResource
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
            'kingdom' => $this->kingdom,
            'phylum' => $this->phylum,
            'class' => $this->class,
            'order' => $this->order,
            'family' => $this->family,
            'genus' => $this->genus,
            'species' => $this->species,
            'colour' => $this->colour,
            'food_type' => $this->food_type,
            'food' => $this->food,
            'min_temperature' => $this->min_temperature,
            'max_temperature' => $this->max_temperature,
            'min_ph' => $this->min_ph,
            'max_ph' => $this->max_ph,
            'habitat' => $this->habitat,
            'created_at' => $this->created_at->format('d-m-Y')
        ];
    }
}
