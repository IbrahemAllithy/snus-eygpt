<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'product_comments';

    protected $fillable = ['customer_id', 'product_id', 'comment', 'parent_id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }
}
