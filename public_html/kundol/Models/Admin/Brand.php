<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'brand_slug', 'gallary_id', 'status', 'created_by', 'updated_by',
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%'.$parameter.'%');
    }

    public function gallary(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
