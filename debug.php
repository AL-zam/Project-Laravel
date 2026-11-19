<?php
ini_set('display_errors', '1');
error_reporting(E_ALL & ~E_DEPRECATED);
register_shutdown_function(function () {
    echo PHP_EOL . "SHUTDOWN last error: ";
    print_r(error_get_last());
});

require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class);

$steps = [
    Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables::class,
    Illuminate\Foundation\Bootstrap\LoadConfiguration::class,
    Illuminate\Foundation\Bootstrap\RegisterFacades::class,
    Illuminate\Foundation\Bootstrap\SetRequestForConsole::class,
    Illuminate\Foundation\Bootstrap\RegisterProviders::class,
    Illuminate\Foundation\Bootstrap\BootProviders::class,
];

foreach ($steps as $step) {
    try {
        $app->bootstrapWith([$step]);
        echo "OK   $step" . PHP_EOL;
    } catch (Throwable $e) {
        echo "FAIL $step" . PHP_EOL;
        echo get_class($e) . ': ' . $e->getMessage() . PHP_EOL;
        echo $e->getFile() . ':' . $e->getLine() . PHP_EOL;
        break;
    }
}