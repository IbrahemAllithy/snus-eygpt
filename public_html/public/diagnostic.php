<?php
// Diagnostic file to check environment detection
echo "<h1>Environment Detection Test</h1>";

echo "<h2>Server Info:</h2>";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? 'not set') . "<br>";
echo "REQUEST_URI: " . ($_SERVER['REQUEST_URI'] ?? 'not set') . "<br>";
echo "DOCUMENT_ROOT: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'not set') . "<br>";

echo "<h2>Environment File Detection:</h2>";
$envFile = '.env';

if (isset($_ENV['LARAVEL_ENV']) && $_ENV['LARAVEL_ENV']) {
    $envFile = $_ENV['LARAVEL_ENV'];
    echo "Method: LARAVEL_ENV variable<br>";
} elseif (isset($_SERVER['HTTP_HOST'])) {
    $host = $_SERVER['HTTP_HOST'];
    if (strpos($host, 'tester.') === 0) {
        $envFile = '.env.tester';
        echo "Method: Subdomain detection (tester.)<br>";
    } else {
        echo "Method: Default (no tester subdomain detected)<br>";
    }
} elseif (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/tester-admin') === 0) {
    $envFile = '.env.tester';
    echo "Method: URL path detection (/tester-admin)<br>";
}

echo "<strong>Selected ENV File: {$envFile}</strong><br>";

echo "<h2>File Existence Check:</h2>";
$envPath = __DIR__ . '/../' . $envFile;
echo "Looking for: {$envPath}<br>";
echo "Exists: " . (file_exists($envPath) ? 'YES ✅' : 'NO ❌') . "<br>";

if (file_exists($envPath)) {
    echo "Readable: " . (is_readable($envPath) ? 'YES ✅' : 'NO ❌') . "<br>";
    echo "File size: " . filesize($envPath) . " bytes<br>";
}

echo "<h2>Laravel Paths:</h2>";
echo "Current directory: " . __DIR__ . "<br>";
echo "Parent directory: " . dirname(__DIR__) . "<br>";

echo "<h2>Expected Files:</h2>";
$expectedFiles = [
    '../.env',
    '../.env.tester',
    'index.php',
    '.htaccess'
];

foreach ($expectedFiles as $file) {
    $fullPath = __DIR__ . '/' . $file;
    echo "{$file}: " . (file_exists($fullPath) ? '✅ EXISTS' : '❌ MISSING') . "<br>";
}

echo "<h2>Permissions:</h2>";
echo "public/ permissions: " . substr(sprintf('%o', fileperms(__DIR__)), -4) . "<br>";

if (file_exists($envPath)) {
    echo "{$envFile} permissions: " . substr(sprintf('%o', fileperms($envPath)), -4) . "<br>";
}
