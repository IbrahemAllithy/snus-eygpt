<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SliderType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function slider(): HasMany
    {
        return $this->hasMany('App\Models\Admin\Slider');
    }

    public function scopeSliderTypeId($query, $id)
    {
        return $query->where('id', $id);
    }
}
