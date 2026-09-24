<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class GallaryDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        $galleryPath = $this->path;
        if ($galleryPath && ! preg_match('#^(https?:)?//#i', $galleryPath)) {
            $galleryPath = asset(ltrim($galleryPath, '/'));
        }

        if (\Request::route()->getName() == 'products.index' || \Request::route()->getName() == 'products.show') {
            return [
                'id' => $this->id,
                'gallary_type' => $this->gallary_type,
                'gallary_path' => $galleryPath,
            ];
        }

        return [
            'id' => $this->id,
            'gallary_type' => $this->gallary_type,
            'gallary_height' => $this->height,
            'gallary_width' => $this->width,
            'gallary_path' => $galleryPath,
        ];
    }
}
