<?php

namespace App\Observers;

use App\Models\Admin\ProductDetail;
use Auth;
use Log;

class ProductDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the ProductDetail "created" event.
     *
     * @return void
     */
    public function created(ProductDetail $productDetail)
    {
        Log::info($this->logText.'create a new product detail'.$productDetail);
    }

    /**
     * Handle the ProductDetail "updated" event.
     *
     * @return void
     */
    public function updated(ProductDetail $productDetail)
    {
        Log::info($this->logText.'update product detail'.$productDetail);
    }

    /**
     * Handle the ProductDetail "deleted" event.
     *
     * @return void
     */
    public function deleted(ProductDetail $productDetail)
    {
        Log::info($this->logText.'delete product detail'.$productDetail);
    }
}
