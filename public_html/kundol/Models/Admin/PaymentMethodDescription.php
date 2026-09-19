<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentMethodDescription extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'payment_method_id', 'name', 'language_id', 'sub_name_1', 'sub_name_2',
    ];

    public function payment_method(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\PaymentMethod', 'payment_method_id', 'id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Language', 'language_id', 'id');
    }
}
