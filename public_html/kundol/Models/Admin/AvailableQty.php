<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AvailableQty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'avaliable_qty';

    public function ScopeProductId($query, $productId)
    {
        return $query->where('product_id', $productId);
    }

    public function ScopeMinPrice($query)
    {
        return $query->min('price');
    }

    public function ScopeProductCombinationId($query, $productCombinationId)
    {
        return $query->where('product_combination_id', $productCombinationId);
    }

    public function ScopeWarehouseId($query, $warehouseId)
    {
        return $query->where('warehouse_id', $warehouseId);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }

    public function current_value_simple_product(): HasOne
    {
        return $this->hasOne(CurrentValueModel::class, 'reference_id', 'product_id')->where('type', 'simple_product');

    }

    public function current_value_variable_product(): HasOne
    {
        return $this->hasOne(CurrentValueModel::class, 'reference_id', 'product_combination_id')->where('type', 'variable_product');

    }
}
