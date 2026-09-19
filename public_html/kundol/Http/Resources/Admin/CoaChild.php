<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CoaChild extends JsonResource
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
            'account_title' => $this->account_title,
            'account_type_id' => $this->account_type_id,
            'parent' => $this->parent,
            'narration' => $this->narration,
        ];
    }
}
