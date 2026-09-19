<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\City as CityResource;
use App\Http\Resources\Admin\State as StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Country extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'country_id' => $this->id,
            'country_name' => $this->name,
            'iso_code_2' => $this->iso_code_2,
            'iso_code_3' => $this->iso_code_3,
            'address_format_id' => $this->address_format_id,
            'country_code' => $this->country_code,
            'status' => $this->status,
            'states' => StateResource::collection($this->whenLoaded('states')),
            'cities' => CityResource::collection($this->whenLoaded('cities')),
        ];
    }
}
