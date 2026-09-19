<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\PageDetail as PageDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Page extends JsonResource
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
            'slug' => $this->slug,
            'detail' => PageDetailResource::collection($this->whenLoaded('page_detail')),
        ];
    }
}
