<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Coa extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'acc_id' => $this->account_id,
            'type' => $this->type,
            'cr' => $this->cr_amount,
            'dr' => $this->dr_amount,
        ];
    }
}
