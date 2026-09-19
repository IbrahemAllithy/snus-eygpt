<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingMethodDescription extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'shipping_method_id', 'name', 'language_id',
    ];

    public function ShippingMethod(): BelongsTo
    {

        return $this->belongsTo(ShippingMethod::class, 'id', 'shipping_method_id');
    }

    public function Language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
