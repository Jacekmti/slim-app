<?php

// cli-config.php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Slim\Container;
/** @var Container $cnt */
$cnt = require_once __DIR__ . '/bootstrap.php';
return ConsoleRunner::createHelperSet($cnt[EntityManager::class]);