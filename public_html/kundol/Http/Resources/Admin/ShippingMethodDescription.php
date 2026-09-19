<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Language as LanguageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingMethodDescription extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'shipping_method_id' => $this->shipping_method_id,
            'name' => $this->name,
            'language_id' => $this->language_id,
            'language' => new LanguageResource($this->Language),
        ];
    }
}
