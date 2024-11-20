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
    public function toArray(Request $request , $warning): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "name" => $this->name,
            "volume" => $this->volume,
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
            "aquariumfishes" => $this->aquariumfishes->map(function ($aquarium) {
                return [
                    'id' => $aquarium->id,
                    'fish_id' => $aquarium->fish_id,
                    'fish_name' => $aquarium->fish->name,
                    'quantity' => $aquarium->quantity,
                ];
            }),
            "warning" => $warning,
        ];
    }
}
