<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gallary_id', 'category_icon', 'parent_id', 'category_slug', 'sort_order', 'created_by', 'updated_by',
    ];

    public function scopeCategoryId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('CategoryDetail', function ($querys) use ($parameter) {
            $querys->where('category_detail.category_name', 'like', '%'.$parameter.'%')->orWhere('category_detail.description', 'like', '%'.$parameter.'%');
        });
    }

    public function scopeGetCategoryByLanguageId($query, $languageId)
    {
        return $query->with(['detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeGetCategoryParentByLanguageId($query, $languageId)
    {
        return $query->with(['parent.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeGetCategoryDetailByLanguageId($query, $languageId, $sortBy, $sortType)
    {
        return $query->orderBy(CategoryDetail::select($sortBy)
            ->whereColumn('category_detail.category_id', 'categories.id')->where('language_id', $languageId), $sortType);
    }

    public function detail(): HasMany
    {
        return $this->hasMany('App\Models\Admin\CategoryDetail', 'category_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Category', 'parent_id', 'id');
    }

    public function gallary(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }

    public function icon(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'category_icon', 'id');
    }

    public function CategoryDetail(): HasMany
    {
        return $this->hasMany(CategoryDetail::class);
    }
}
