<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\AttributeDetail as AttributeDetailResource;
use App\Http\Resources\Admin\Variation as VariationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Attribute extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'attribute_id' => $this->id,
            'detail' => AttributeDetailResource::collection($this->whenLoaded('attribute_detail')),
            'variations' => VariationResource::collection($this->whenLoaded('variation')),
        ];
    }
}
