<?php

namespace App\Observers;

use App\Models\Admin\SaleDetail;
use Auth;
use Log;

class SaleDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the SaleDetail "created" event.
     *
     * @return void
     */
    public function created(SaleDetail $saleDetail)
    {
        Log::info($this->logText.'create a new sale detail'.$saleDetail);
    }

    /**
     * Handle the SaleDetail "updated" event.
     *
     * @return void
     */
    public function updated(SaleDetail $saleDetail)
    {
        Log::info($this->logText.'update sale detail'.$saleDetail);
    }

    /**
     * Handle the SaleDetail "deleted" event.
     *
     * @return void
     */
    public function deleted(SaleDetail $saleDetail)
    {
        Log::info($this->logText.'delete sale detail'.$saleDetail);
    }
}
