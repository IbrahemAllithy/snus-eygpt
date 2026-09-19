<?php

namespace App\Http\Resources\Web;

use App\Http\Resources\Admin\Customer as CustomerResource;
use App\Http\Resources\Admin\Product as ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'product' => new ProductResource($this->whenLoaded('product')),
            'comment' => $this->comment,
            'parent_id' => $this->parent_id,
        ];
    }
}
