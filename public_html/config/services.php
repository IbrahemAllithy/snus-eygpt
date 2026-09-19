<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        // '1923453517816717'
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        // '73ee9bdf658414248817c2b45d1ca132'
        'redirect' => env('FACEBOOK_REDIRECT'),
        // 'https://c54ca899e3f4.ngrok.io/kundol-laravel/public/api/client/customer_login/facebook/callback'
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        // '528070814470-ah0p45kiho5k2k4r20l8sckf7i1rp99a.apps.googleusercontent.com'
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        // 'i-fcC_ILJpSUPwuGYhzQ53Vm'
        'redirect' => env('GOOGLE_REDIRECT'),
        // 'http://kundol-api.vector-coder.com/api/client/customer_login/google/callback'
    ],

    'paytm-wallet' => [
        'env' => 'local', // values : (local | production)
        'merchant_id' => env('PAYTM_MERCHANT_ID'),
        'merchant_key' => env('PAYTM_MERCHANT_KEY'),
        'merchant_website' => env('PAYTM_MERCHANT_WEBSITE'),
        'channel' => env('PAYTM_CHANNEL'),
        'industry_type' => env('PAYTM_INDUSTRY_TYPE'),
    ],

];
