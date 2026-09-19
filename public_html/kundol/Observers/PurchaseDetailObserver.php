<?php

namespace App\Observers;

use App\Models\Admin\PurchaseDetail;
use Auth;
use Log;

class PurchaseDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the PurchaseDetail "created" event.
     *
     * @return void
     */
    public function created(PurchaseDetail $purchaseDetail)
    {
        Log::info($this->logText.'create a new purchase detail'.$purchaseDetail);
    }

    /**
     * Handle the PurchaseDetail "updated" event.
     *
     * @return void
     */
    public function updated(PurchaseDetail $purchaseDetail)
    {
        Log::info($this->logText.'update purchase detail'.$purchaseDetail);
    }

    /**
     * Handle the PurchaseDetail "deleted" event.
     *
     * @return void
     */
    public function deleted(PurchaseDetail $purchaseDetail)
    {
        Log::info($this->logText.'delete purchase detail'.$purchaseDetail);
    }
}
