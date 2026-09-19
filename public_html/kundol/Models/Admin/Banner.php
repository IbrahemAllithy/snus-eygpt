<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'language_id', 'ref_id', 'slider_navigation_id', 'status', 'created_by', 'updated_by', 'gallary_id',
    ];

    public function scopeBannerId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function gallary(): BelongsTo
    {
        return $this->belongsTo(Gallary::class, 'gallary_id');
    }

    public function slider_navigation(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\SliderNavigation', 'slider_navigation_id', 'id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Language', 'language_id', 'id');
    }
}
