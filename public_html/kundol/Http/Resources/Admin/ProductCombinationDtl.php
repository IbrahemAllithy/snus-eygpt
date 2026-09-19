<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Variation as VariationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCombinationDtl extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'variation_id' => $this->variation_id,
            'variation' => new VariationResource($this->variation),
        ];
    }
}
