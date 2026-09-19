<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SliderNavigation extends Model
{
    protected $table = 'slider_navigation';

    protected $fillable = [
        'name',
    ];

    public function slider(): HasMany
    {
        return $this->hasMany('App\Models\Admin\Slider');
    }

    public function scopeSliderNavigationId($query, $id)
    {
        return $query->where('id', $id);
    }
}
