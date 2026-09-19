<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleReturn extends Model
{
    use SoftDeletes;

    protected $table = 'sale_return';

    protected $fillable = [
        'adjustment', 'created_by', 'updated_by',
    ];

    public function scopeSaleReturnId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function saleReturnDetail(): HasMany
    {
        return $this->hasMany('App\Models\Admin\SaleReturnDetail');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
