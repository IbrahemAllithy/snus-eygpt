<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'gallary_id', 'is_seen', 'status', 'hash', 'password', 'created_by', 'updated_by', 'provider', 'provider_id', 'phone_number',
    ];

    protected $hidden = [
        'password',
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('first_name', 'like', '%'.$parameter.'%')->orWhere('last_name', 'like', '%'.$parameter.'%')->orWhere('email', 'like', '%'.$parameter.'%');
    }

    public function scopeCustomerId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeHash($query, $hash)
    {
        return $query->where('hash', $hash);
    }

    public function gallary(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }

    public function customer_address_book(): HasMany
    {
        return $this->hasMany('App\Models\Web\CustomerAddressBook');
    }
}
