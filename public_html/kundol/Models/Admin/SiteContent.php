<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = [
        'key',
        'group',
        'label',
        'type',
        'value',
        'sort_order',
    ];

    protected $casts = [
        'value' => 'json',
    ];
}
