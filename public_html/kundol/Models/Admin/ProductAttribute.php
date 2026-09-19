<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductAttribute extends Model
{
    protected $table = 'product_attribute';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'attribute_id',
    ];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Attribute', 'attribute_id', 'id');
    }

    public function variation(): HasMany
    {
        return $this->hasMany('App\Models\Admin\ProductVariation', 'product_attribute_id', 'id');
    }
}
