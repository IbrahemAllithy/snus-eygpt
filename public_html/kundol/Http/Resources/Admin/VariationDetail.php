<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Language as LanguageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VariationDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'language' => new LanguageResource($this->language),
        ];
    }
}
