<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallary extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'gallary';

    protected $fillable = [
        'name', 'extension', 'user_id', 'created_by', 'updated_by',
    ];

    public function detail(): HasMany
    {
        return $this->hasMany('App\Models\Admin\GallaryDetail', 'gallary_id', 'id');
    }

    public function GallaryDetail(): HasMany
    {
        return $this->hasMany(GallaryDetail::class);
    }

    public function Brand(): HasMany
    {
        return $this->hasMany(Brand::class);
    }

    public function Category(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function gallary_tag(): HasMany
    {
        return $this->hasMany(GallaryTag::class);
    }
}
