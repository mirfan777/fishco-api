<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FishImageResource extends JsonResource
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
            'fish_id' => $this->fish_id,
            'image' => $this->image,
            'url' => asset('data/images/' . $this->image),
            'status' => $this->status,
            'disease_id' => $this->disease_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
