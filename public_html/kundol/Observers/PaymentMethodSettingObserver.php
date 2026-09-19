<?php

namespace App\Observers;

use App\Models\Admin\PaymentMethodSetting;
use Auth;
use Log;

class PaymentMethodSettingObserver
{
    public function __construct()
    {
        $this->logText = 'User ID '.Auth::id();
    }

    /**
     * Handle the PaymentMethodSetting "created" event.
     *
     * @return void
     */
    public function created(PaymentMethodSetting $paymentMethodSetting)
    {
        Log::info($this->logText.' created a new payment method setting: '.$paymentMethodSetting);
    }

    /**
     * Handle the PaymentMethodSetting "updated" event.
     *
     * @return void
     */
    public function updated(PaymentMethodSetting $paymentMethodSetting)
    {
        Log::info($this->logText.' Update a payment method setting: '.$paymentMethodSetting);
    }

    /**
     * Handle the PaymentMethodSetting "deleted" event.
     *
     * @return void
     */
    public function deleted(PaymentMethodSetting $paymentMethodSetting)
    {
        Log::info($this->logText.' Delete a payment method setting: '.$paymentMethodSetting);
    }
}
