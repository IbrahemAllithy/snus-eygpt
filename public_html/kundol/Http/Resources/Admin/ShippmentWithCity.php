<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\City as CityResource;
use App\Http\Resources\Admin\Country as CountryResource;
use App\Http\Resources\Admin\State as StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippmentWithCity extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'shippment_price' => $this->shippment_price,
            'state_id' => $this->state_id,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'country' => new CountryResource($this->whenLoaded('country')),
            'state' => new StateResource($this->whenLoaded('state')),
            'city' => new CityResource($this->whenLoaded('city')),
        ];
    }
}
