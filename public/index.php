<?php

use Slim\App as App;

require '../vendor/autoload.php';

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';
session_start();

$settings = require __DIR__ . '/../code/settings.php';
$app = new App($settings);

// Register routes
require __DIR__ . '/../code/routes.php';
//// Set up dependencies
require __DIR__ . '/../code/dependencies.php';
// Run app
$app->run();