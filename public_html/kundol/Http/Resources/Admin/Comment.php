<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Customer as CustomerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
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
            'message' => $this->message,
            'created_at' => $this->created_at->diffForHumans(),
            'user' => new User($this->user),
            'customer' => new CustomerResource($this->customer),
        ];
    }
}
