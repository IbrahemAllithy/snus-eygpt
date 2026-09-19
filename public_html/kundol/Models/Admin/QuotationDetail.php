<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuotationDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'quotation_detail';

    protected $fillable = [
        'quotation_id', 'product_id', 'product_combination_id', 'price', 'discount_amount', 'tax_amount', 'subtotal', 'qty',
    ];

    public function quotation(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Quotation', 'quotation_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id');
    }

    public function product_combination(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\ProductCombination', 'product_combination_id');
    }
}
