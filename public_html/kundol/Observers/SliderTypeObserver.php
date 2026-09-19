<?php

namespace App\Observers;

use App\Models\Admin\SliderType;
use Auth;
use Log;

class SliderTypeObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the SliderType "created" event.
     *
     * @return void
     */
    public function created(SliderType $sliderType)
    {
        Log::info($this->logText.'create a new slider type'.$sliderType);
    }

    /**
     * Handle the SliderType "updated" event.
     *
     * @return void
     */
    public function updated(SliderType $sliderType)
    {
        Log::info($this->logText.'update slider type'.$sliderType);
    }

    /**
     * Handle the SliderType "deleted" event.
     *
     * @return void
     */
    public function deleted(SliderType $sliderType)
    {
        Log::info($this->logText.'delete slider type'.$sliderType);
    }
}
