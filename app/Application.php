<?php

namespace app\app;

use app\app\Router;


class Application {

    public Router $router;

    public function __construct()
    {
        $this->router = new Router;
    }

    public function run(){
        $this->router->resolve();
    }

}