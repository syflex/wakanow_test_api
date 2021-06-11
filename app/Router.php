<?php

namespace app\app;


class Router {

    protected $routes = [];

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function resolve(){
        echo "<pre>";
        var_dump($_SESSION);
        echo "<pre>";
        exit;
    }

}