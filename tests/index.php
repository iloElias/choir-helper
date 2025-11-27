<?php

require_once __DIR__ . '/index.php';

echo config('app.name') . PHP_EOL;
echo config('database.connections.mysql.host') . PHP_EOL;
echo config('cache.default') . PHP_EOL;
echo config('queue.default') . PHP_EOL;


