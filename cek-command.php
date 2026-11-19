<?php

require __DIR__ . '/vendor/autoload.php';

echo "1. AUTOLOAD OK\n";

$app = require __DIR__ . '/bootstrap/app.php';

echo "2. BOOTSTRAP OK\n";

use Symfony\Component\Console\Input\ArgvInput;

echo "3. MENJALANKAN COMMAND\n";

$status = $app->handleCommand(
    new ArgvInput(['artisan', '--version'])
);

echo "\n4. STATUS: " . $status . "\n";
