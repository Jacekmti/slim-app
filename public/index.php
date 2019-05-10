<?php

use Slim\App;

$cnt = require_once __DIR__ . '/../bootstrap.php';
$app = $cnt[App::class];

// Register routes
require APP_ROOT . '/src/routes.php';

$app->run();