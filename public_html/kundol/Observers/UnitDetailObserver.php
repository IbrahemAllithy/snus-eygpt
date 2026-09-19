<?php

namespace App\Observers;

use App\Models\Admin\UnitDetail;
use Auth;
use Log;

class UnitDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the UnitDetail "created" event.
     *
     * @return void
     */
    public function created(UnitDetail $unitDetail)
    {
        Log::info($this->logText.'create a new unit detail'.$unitDetail);
    }

    /**
     * Handle the UnitDetail "updated" event.
     *
     * @return void
     */
    public function updated(UnitDetail $unitDetail)
    {
        Log::info($this->logText.'update unit detail'.$unitDetail);
    }

    /**
     * Handle the UnitDetail "deleted" event.
     *
     * @return void
     */
    public function deleted(UnitDetail $unitDetail)
    {
        Log::info($this->logText.'delete unit detail'.$unitDetail);
    }
}
