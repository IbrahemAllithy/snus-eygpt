<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Variation as VariationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'product_variation' => new VariationResource($this->variation),
        ];
    }
}
