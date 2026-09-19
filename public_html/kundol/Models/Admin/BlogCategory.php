<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'blog_category_slug', 'gallary_id', 'status', 'created_by', 'updated_by',
    ];

    public function scopeBlogCategoryId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('blogCategoryDetail', function ($querys) use ($parameter) {
            $querys->where('blog_category_detail.name', 'like', '%'.$parameter.'%');
        });
    }

    public function scopeGetBlogCategoryDetail($query, $languageId)
    {
        return $query->with('blogCategoryDetail', function ($querys) use ($languageId) {
            $querys->where('language_id', $languageId);
        });
    }

    public function scopeSortByCategoryDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(BlogCategoryDetail::select($sortBy)
            ->whereColumn('blog_category_detail.blog_category_id', 'blog_categories.id')->where('language_id', $languageId), $sortType);
    }

    public function blogCategoryDetail(): HasMany
    {
        return $this->hasMany('App\Models\Admin\BlogCategoryDetail', 'blog_category_id', 'id');
    }

    public function gallary(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }
}
