<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\TaxRate as TaxRateResource;
use App\Models\Admin\TaxRate;
use Illuminate\Http\Resources\Json\JsonResource;

class Tax extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'tax_id' => $this->id,
            'tax_title' => $this->title,
            'tax_description' => $this->description,
            'tax_rate' => new TaxRateResource(TaxRate::where('tax_id', $this->id)->first()),

        ];
    }
}
