<?php

namespace App\Observers;

use App\Models\Admin\ProductComment;
use Auth;
use Log;

class ProductCommentObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the ProductComment "created" event.
     *
     * @return void
     */
    public function created(ProductComment $productComment)
    {
        Log::info($this->logText.'create a new product comment'.$productComment);
    }

    /**
     * Handle the ProductComment "updated" event.
     *
     * @return void
     */
    public function updated(ProductComment $productComment)
    {
        Log::info($this->logText.'update product comment'.$productComment);
    }

    /**
     * Handle the ProductComment "deleted" event.
     *
     * @return void
     */
    public function deleted(ProductComment $productComment)
    {
        Log::info($this->logText.'delete product comment'.$productComment);
    }
}
