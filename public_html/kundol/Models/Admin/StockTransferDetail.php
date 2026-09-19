<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockTransferDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'stock_transfer_detail';

    public $timestamps = false;

    protected $fillable = [
        'stock_transfer_id', 'product_id', 'product_combination_id', 'qty',
    ];

    public function stick_transfer(): BelongsTo
    {
        return $this->belongsTo(StockTransfer::class, 'stock_transfer_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function product_combination(): BelongsTo
    {
        return $this->belongsTo(ProductCombination::class, 'product_combination_id');
    }
}
