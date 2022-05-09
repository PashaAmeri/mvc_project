<?php

namespace App_hospital\core;

class Router
{

    private $routes = [];

    public function get($uri, $callback)
    {

        $this->routes['get'][$uri] = $callback;
    }

    public function resolve()
    {

        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $uri = $_SERVER['REQUEST_URI'];

        $callback = $this->routes[$method][$uri] ?? NULL;

        if ($callback === NULL) {

            die('404: not found');
        }

        return call_user_func($callback);
    }
}
