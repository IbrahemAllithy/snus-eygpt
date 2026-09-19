<?php

namespace App\Observers;

use App\Models\Admin\Customer;
use Auth;
use Log;

class CustomerObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the Customer "created" event.
     *
     * @return void
     */
    public function created(Customer $customer)
    {
        Log::info($this->logText.' create a new customer'.$customer);
    }

    /**
     * Handle the Customer "updated" event.
     *
     * @return void
     */
    public function updated(Customer $customer)
    {
        Log::info($this->logText.' update customer'.$customer);
    }

    /**
     * Handle the Customer "deleted" event.
     *
     * @return void
     */
    public function deleted(Customer $customer)
    {
        Log::info($this->logText.' delete customer'.$customer);
    }
}
