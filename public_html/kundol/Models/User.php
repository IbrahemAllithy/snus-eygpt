<?php

namespace App\Models;

use App\Models\Admin\Attribute;
use App\Models\Admin\BlogCategory;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Gallary;
use App\Models\Admin\Product;
use App\Models\Admin\Warehouse as AdminWarehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('first_name', 'like', '%'.$parameter.'%')->orWhere('last_name', 'like', '%'.$parameter.'%')->orWhere('email', 'like', '%'.$parameter.'%')->orWhere('id', 'like', '%'.$parameter.'%');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Role', 'role_id', 'id');
    }

    public function Gallary(): HasMany
    {
        return $this->hasMany(Gallary::class);
    }

    public function BlogCategory(): HasMany
    {
        return $this->hasMany(BlogCategory::class, 'created_by', 'id');
    }

    public function Attribute(): HasMany
    {
        return $this->hasMany(Attribute::class, 'created_by', 'id');
    }

    public function Product(): HasMany
    {
        return $this->hasMany(Product::class, 'created_by', 'id');
    }

    public function Brand(): HasMany
    {
        return $this->hasMany(Brand::class, 'created_by', 'id');
    }

    public function Category(): HasMany
    {
        return $this->hasMany(Category::class, 'created_by', 'id');
    }

    public function warehouses(): BelongsToMany
    {
        return $this->belongsToMany(AdminWarehouse::class, 'user_warehouses');
    }

    // public function getEmailAttribute($value)
    // {
    //     return Str::slug(strtolower($value), '-');
    // }

    // public function setEmailAttribute($value)
    // {
    //     $this->attributes['email'] = Str::slug(strtolower($value), '-');
    // }
}
