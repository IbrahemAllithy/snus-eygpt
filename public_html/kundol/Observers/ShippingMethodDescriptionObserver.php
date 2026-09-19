<?php

namespace App\Observers;

use App\Models\Admin\ShippingMethodDescription;
use Auth;
use Log;

class ShippingMethodDescriptionObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the ShippingMethodDescription "created" event.
     *
     * @return void
     */
    public function created(ShippingMethodDescription $shippingMethodDescription)
    {
        Log::info($this->logText.'create a new shipping method description'.$shippingMethodDescription);
    }

    /**
     * Handle the ShippingMethodDescription "updated" event.
     *
     * @return void
     */
    public function updated(ShippingMethodDescription $shippingMethodDescription)
    {
        Log::info($this->logText.'update shipping method description'.$shippingMethodDescription);
    }

    /**
     * Handle the ShippingMethodDescription "deleted" event.
     *
     * @return void
     */
    public function deleted(ShippingMethodDescription $shippingMethodDescription)
    {
        Log::info($this->logText.'delete shipping method description'.$shippingMethodDescription);
    }
}
