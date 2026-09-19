<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Setting extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'setting_key' => $this->key,
            'setting_value' => $this->value,
            'setting_type' => $this->type,
        ];
    }
}
