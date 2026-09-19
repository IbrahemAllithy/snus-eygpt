<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariation extends Model
{
    protected $table = 'product_variation';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_attribute_id', 'variation_id',
    ];

    public function variation(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Variation', 'variation_id', 'id');
    }
}
