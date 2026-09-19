<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';

    public $timestamps = false;

    protected $fillable = ['warehouse_id', 'order_id', 'product_id', 'product_combination_id', 'product_price', 'product_discount', 'product_tax', 'qty', 'total'];

    public function product(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function product_combination(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\ProductCombination', 'product_combination_id', 'id');
    }
}
