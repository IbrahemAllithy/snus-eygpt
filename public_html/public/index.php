<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine which .env file to use based on environment variable or subdomain
$envFile = '.env';

// Check if LARAVEL_ENV is set (via .htaccess or server config)
if (isset($_ENV['LARAVEL_ENV']) && $_ENV['LARAVEL_ENV']) {
    $envFile = $_ENV['LARAVEL_ENV'];
}
// Or check subdomain
elseif (isset($_SERVER['HTTP_HOST'])) {
    $host = $_SERVER['HTTP_HOST'];
    if (strpos($host, 'tester.') === 0) {
        $envFile = '.env.tester';
    }
}
// Or check URL path (temporary solution: /tester-admin)
elseif (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/tester-admin') === 0) {
    $envFile = '.env.tester';
}

// Set the environment file
putenv("ENV_FILE={$envFile}");
$_ENV['ENV_FILE'] = $envFile;
$_SERVER['ENV_FILE'] = $envFile;

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
