<?php

namespace App\Observers;

use App\Models\Admin\Gallary;
use Auth;
use Log;

class GallaryObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the Gallary "created" event.
     *
     * @return void
     */
    public function created(Gallary $gallary)
    {
        Log::info($this->logText.' created a new gallary '.$gallary);
    }

    /**
     * Handle the Gallary "updated" event.
     *
     * @return void
     */
    public function updated(Gallary $gallary)
    {
        Log::info($this->logText.' Update gallary '.$gallary);
    }

    /**
     * Handle the Gallary "deleted" event.
     *
     * @return void
     */
    public function deleted(Gallary $gallary)
    {
        Log::info($this->logText.' delete gallary '.$gallary);
    }
}
