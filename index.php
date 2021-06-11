<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\app\Application;
use app\app\Router;

$app = new Application();
$router = new Router;

$app->router->get('/', function() {
    return "Hello World";
});

$app->run();