<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Language as LanguageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'category_id' => $this->category_id,
            'name' => $this->category_name,
            'description' => $this->description,
            'language' => new LanguageResource($this->language),
        ];
    }
}
