<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

set_error_handler(function ($severity, $message, $file, $line) {
    echo "\nPHP ERROR: $message\n";
    echo "FILE: $file\n";
    echo "LINE: $line\n";
    return false;
});

set_exception_handler(function ($e) {
    echo "\nEXCEPTION: " . get_class($e) . "\n";
    echo $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
});

register_shutdown_function(function () {
    $error = error_get_last();

    if ($error !== null) {
        echo "\nSHUTDOWN ERROR:\n";
        print_r($error);
    } else {
        echo "\nSCRIPT SHUTDOWN NORMAL\n";
    }
});

echo "TAHAP 1\n";

require __DIR__ . '/vendor/autoload.php';

echo "TAHAP 2\n";

$app = require __DIR__ . '/bootstrap/app.php';

echo "TAHAP 3\n";

$kernel = $app->make(
    Illuminate\Contracts\Console\Kernel::class
);

echo "TAHAP 4\n";

var_dump(get_class($kernel));

echo "TAHAP 5\n";
