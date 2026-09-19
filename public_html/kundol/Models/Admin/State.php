<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'country_id',
        'status',
    ];

    public function scopeStateId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeOrderByStatus($query)
    {

        $query1 = "CASE WHEN status = 'active' THEN 1 ";
        $query1 .= "WHEN status = 'inactive' THEN 2 ";
        $query1 .= "WHEN status = 'disable' THEN 3 ";
        $query1 .= 'ELSE 4 END asc';

        return $query->orderByRaw($query1);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%'.$parameter.'%');
    }

    public function scopeCountryId($query, $id)
    {
        return $query->where('country_id', $id);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Country', 'country_id', 'id');
    }

    public function cities(): HasMany
    {
        return $this->hasMany('App\Models\Admin\City');
    }

    public function shippmentWithCity(): HasMany
    {
        return $this->hasMany('App\Models\Admin\ShippmentWithCity');
    }
}
