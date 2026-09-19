<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetail extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->order_id,
            'product' => new ProductResource($this->whenLoaded('product')),
            'product_combination' => new ProductCombinationResource($this->whenLoaded('product_combination')),
            'product_combination_id' => $this->product_combination,
            'product_price' => $this->product_price,
            'product_discount' => $this->product_discount,
            'product_tax' => $this->product_tax,
            'product_qty' => $this->qty,
            'product_total' => $this->total,
        ];
    }
}
