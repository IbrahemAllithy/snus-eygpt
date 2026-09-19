<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GallaryTag extends Model
{
    protected $fillable = [
        'gallary_id', 'tag_id',
    ];

    public $timestamps = false;

    public function tag(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Tag', 'tag_id', 'id');
    }

    public function gallary(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }
}
