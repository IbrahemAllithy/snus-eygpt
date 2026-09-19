<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'gallary_id', 'language_id',
    ];

    public function gallary(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Language', 'language_id', 'id');
    }
}
