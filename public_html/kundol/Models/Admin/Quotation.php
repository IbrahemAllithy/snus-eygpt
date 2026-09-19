<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'biller_id', 'supplier_id', 'customer_id', 'warehouse_id', 'tax_id', 'gallary_id', 'discount_amount', 'status', 'shipping_cost', 'tax_amount', 'grand_total', 'note', 'created_by', 'updated_by', 'type', 'uuid',
    ];

    public function scopeGetProductDetailByLanguageId($query, $languageId)
    {
        return $query->with(['quotation_detail.product.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function biller(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Biller', 'biller_id');
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Supplier', 'supplier_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id');
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Warehouse', 'warehouse_id');
    }

    public function tax(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Tax', 'tax_id');
    }

    public function gallary(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id');
    }

    public function quotation_detail(): HasMany
    {
        return $this->hasMany('App\Models\Admin\QuotationDetail');
    }
}
