<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\UnitDetail as UnitDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Unit extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'is_active' => $this->is_active,
            'detail' => UnitDetailResource::collection($this->whenLoaded('detail')),
        ];
    }
}
