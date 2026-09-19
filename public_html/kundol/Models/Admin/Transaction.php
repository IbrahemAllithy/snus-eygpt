<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_number', 'transaction_date', 'description',
    ];

    public function detail(): HasMany
    {
        return $this->hasMany('App\Models\Admin\TransactionDetail');
    }
}
