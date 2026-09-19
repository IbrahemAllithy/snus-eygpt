<?php

namespace App\Observers;

use App\Models\Admin\GallaryDetail;
use Auth;
use Log;

class GallaryDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the GallaryDetail "created" event.
     *
     * @return void
     */
    public function created(GallaryDetail $gallaryDetail)
    {
        Log::info($this->logText.' create a new gallary detail'.$gallaryDetail);
    }

    /**
     * Handle the GallaryDetail "updated" event.
     *
     * @return void
     */
    public function updated(GallaryDetail $gallaryDetail)
    {
        Log::info($this->logText.' update gallary detail'.$gallaryDetail);
    }

    /**
     * Handle the GallaryDetail "deleted" event.
     *
     * @return void
     */
    public function deleted(GallaryDetail $gallaryDetail)
    {
        Log::info($this->logText.' delete gallary detail'.$gallaryDetail);
    }
}
