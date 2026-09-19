<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Role as RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'u_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'role' => new RoleResource($this->role),
            'warehouse' => Warehouse::collection($this->warehouses),

        ];
    }
}
