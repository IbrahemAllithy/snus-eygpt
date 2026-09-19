<?php

namespace App\Observers;

use App\Models\Admin\Unit;
use Auth;
use Log;

class UnitObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the Unit "created" event.
     *
     * @return void
     */
    public function created(Unit $unit)
    {
        Log::info($this->logText.'create a new unit'.$unit);
    }

    /**
     * Handle the Unit "updated" event.
     *
     * @return void
     */
    public function updated(Unit $unit)
    {
        Log::info($this->logText.'update unit'.$unit);
    }

    /**
     * Handle the Unit "deleted" event.
     *
     * @return void
     */
    public function deleted(Unit $unit)
    {
        Log::info($this->logText.'delete unit'.$unit);
    }
}
