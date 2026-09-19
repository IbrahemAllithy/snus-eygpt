<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Attribute as AttributeResource;
use App\Http\Resources\Admin\VariationDetail as VariationDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Variation extends JsonResource
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
            // 'detail' => VariationDetailResource::collection($this->whenLoaded('variation_detail')),
            'detail' => VariationDetailResource::collection($this->variation_detail),
            'attribute' => new AttributeResource($this->whenLoaded('attribute')),
        ];
    }
}
