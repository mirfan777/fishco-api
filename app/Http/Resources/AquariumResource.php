<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class AquariumResource extends JsonResource
{
    /**
     * @var array
     */
    protected $warning;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {

    return [
        "id" => $this->id,
        "user_id" => $this->user_id,
        "name" => $this->name,
        "volume_size" => $this->volume_size,
        "type" => $this->type,
        "filter_type" => $this->filter_type,
        "filter_capacity" => $this->filter_capacity,
        "filter_media" => $this->filter_media,
        "min_temperature" => $this->min_temperature,
        "max_temperature" => $this->max_temperature,
        "min_ph" => $this->min_ph,
        "max_ph" => $this->max_ph,
        "min_salinity" => $this->min_salinity,
        "max_salinity" => $this->max_salinity,
        "turbidity" => $this->turbidity,
        "aquariumfishes" => FishResource::collection($this->aquariumfishes)
    ];
    }
}
