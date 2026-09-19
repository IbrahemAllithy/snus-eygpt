<?php

return [

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    'disks' => [
        'gallary' => [
            'driver' => 'local',
            'root' => public_path().'/gallary',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],
    ],

];
