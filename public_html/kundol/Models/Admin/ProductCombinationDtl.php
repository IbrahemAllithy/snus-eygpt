<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCombinationDtl extends Model
{
    protected $table = 'product_combination_dtl';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_combination_id', 'variation_id', 'product_id',
    ];

    public function variation(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Variation', 'variation_id', 'id');
    }
}
