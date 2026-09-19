<?php

namespace App\Observers;

use App\Models\Admin\CategoryDetail;
use Auth;
use Log;

class CategoryDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the CategoryDetail "created" event.
     *
     * @return void
     */
    public function created(CategoryDetail $categoryDetail)
    {
        Log::info($this->logText.'create a new category detail'.$categoryDetail);
    }

    /**
     * Handle the CategoryDetail "updated" event.
     *
     * @return void
     */
    public function updated(CategoryDetail $categoryDetail)
    {
        Log::info($this->logText.'update category detail'.$categoryDetail);
    }

    /**
     * Handle the CategoryDetail "deleted" event.
     *
     * @return void
     */
    public function deleted(CategoryDetail $categoryDetail)
    {
        Log::info($this->logText.'delete category detail'.$categoryDetail);
    }
}
