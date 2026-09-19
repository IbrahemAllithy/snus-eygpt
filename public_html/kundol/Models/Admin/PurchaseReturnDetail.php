<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseReturnDetail extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'purchase_return_id', 'purchase_id', 'product_id', 'product_combination_id', 'qty',
    ];

    public function scopeStockCheck($query, $product_id, $product_combination_id, $purchase_id)
    {
        return $query->where('product_combination_id', $product_combination_id)->where('product_id', $product_id)->where('purchase_id', $purchase_id);
    }

    public function purchaseReturn(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\PurchaseReturn', 'purchase_return_id', 'id');
    }

    public function purchase(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Purchase', 'purchase_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function product_combination(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\ProductCombination', 'product_ombination_id', 'id');
    }
}
