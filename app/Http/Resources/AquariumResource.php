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

    Log::info('Processing resource:', [
        'aquarium_id' => $this->id,
        'has_fishes' => $this->aquariumfishes->count(),
        'raw_fishes' => $this->aquariumfishes->toArray()
    ]);     

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
        "aquariumfishes" => $this->aquariumfishes->map(function ($aquarium) {
            return [
                'id' => $aquarium->id,
                'fish_id' => $aquarium->fish_id,
                'fish_name' => $aquarium->fish->name,
                'quantity' => $aquarium->quantity,
            ];
        }),
        "warning" => $this->warning ?? []
    ];
    }

    public function __construct($resource, $warning = [])
    {
            parent::__construct($resource);
            $this->warning = $warning;
    }
}
