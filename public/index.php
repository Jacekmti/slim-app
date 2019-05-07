<?php

use Slim\App;

$cnt = require_once __DIR__ . '/../bootstrap.php';
$app = $cnt[App::class];
$app->run();