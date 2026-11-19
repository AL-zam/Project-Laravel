<?php
require __DIR__ . '/vendor/autoload.php';

echo "TAHAP 1 OK\n";

$app = require __DIR__ . '/bootstrap/app.php';

echo "TAHAP 2 OK\n";

var_dump(get_class($app));
