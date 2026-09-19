<?php

return [

    'guards' => [
        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'user-api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],

        'customer' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],

        'customer-api' => [
            'driver' => 'passport',
            'provider' => 'customers',
        ],
    ],

    'providers' => [
        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin\Customer::class,
        ],
    ],

];
