<?php

// Api Routes
use App\Auth\RegisterController;
use Slim\App;

$app->group('/api',
    function () {
        /** @var App $this */
        // Auth Routes
        $this->post('/users', RegisterController::class . ':register')->setName('auth.register');
    });