<?php

use App\Provider\Doctrine;
use App\Provider\Slim;
use Slim\Container;

require_once __DIR__ . '/vendor/autoload.php';

define('APP_ROOT', __DIR__);
if (!file_exists(APP_ROOT . '/settings.php')) {
    copy(APP_ROOT . '/settings_sample.php', APP_ROOT . '/settings.php');
}

$cnt = new Container(require __DIR__ . '/settings.php');

// Register Twig component on container
$cnt['view'] = function ($cnt) {
    return new \Slim\Views\Twig('/code/public/resources/views', [
            'cache' => false
        ]);
};


$cnt->register(new Doctrine())
    ->register(new Slim());

return $cnt;