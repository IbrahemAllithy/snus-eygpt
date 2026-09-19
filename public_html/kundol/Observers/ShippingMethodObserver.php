<?php

namespace App\Observers;

use App\Models\Admin\ShippingMethod;
use Auth;
use Log;

class ShippingMethodObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the ShippingMethod "created" event.
     *
     * @return void
     */
    public function created(ShippingMethod $shippingMethod)
    {
        Log::info($this->logText.'create a new shipping method'.$shippingMethod);
    }

    /**
     * Handle the ShippingMethod "updated" event.
     *
     * @return void
     */
    public function updated(ShippingMethod $shippingMethod)
    {
        Log::info($this->logText.'update shipping method'.$shippingMethod);
    }

    /**
     * Handle the ShippingMethod "deleted" event.
     *
     * @return void
     */
    public function deleted(ShippingMethod $shippingMethod)
    {
        Log::info($this->logText.'delete shipping method'.$shippingMethod);
    }
}
