<?php

namespace app\app;

use app\app\Router;


class Application {

    public $router;

    public function __destruct()
    {
        $this->router = new Router;
    }

    public function run(){
        $this->router->resolve();
    }

}