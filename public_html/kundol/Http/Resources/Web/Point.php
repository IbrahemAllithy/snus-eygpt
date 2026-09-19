<?php

namespace App\Http\Resources\Web;

use App\Http\Resources\Admin\Customer as CustomerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Point extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'reference_id' => $this->reference_id,
            'points' => $this->points,
            'description' => $this->description,
            'customer_id' => $this->customer_id,
            'status' => $this->status,
            'customer_detail' => new CustomerResource($this->customer),
            // 'availableQty' => $this->availableQty,
        ];
    }
}
