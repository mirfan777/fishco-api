<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AquariumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "user_id" => $this->user_id,
            "name" => $this->name,
            "volume" => $this->volume,
            "length" => $this->length,
            "width" => $this->width,
            "height" => $this->height,
            "material" => $this->material,
            "type" => $this->type,
            "filter_type" => $this->filter_type,
            "filter_capacity" => $this->filter_capacity,
            "filter_media" => $this->filter_media,
            "min_temperature" => $this->min_temperature,
            "max_temperature" => $this->max_temperature,
            "min_ph" => $this->min_ph,
            "max_ph" => $this->max_ph,
            "turbidity" => $this->turbidity,
            "salitity" => $this->salitity,
            "dissolved_oxygen" => $this->dissolved_oxygen,
            "hardness" => $this->hardness,
            "ammonia" => $this->ammonia,
            "nitrite" => $this->nitrite,
            "nitrate" => $this->nitrate

        ];
    }
}
