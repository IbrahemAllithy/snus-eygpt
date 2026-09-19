<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Language as LanguageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'unit_id' => $this->unit_id,
            'name' => $this->name,
            'language' => new LanguageResource($this->language),
        ];
    }
}
