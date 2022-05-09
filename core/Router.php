<?php

/*
    class: Router

    This class help user to move throuth the web apps
*/

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

        if (is_null($callback)) {

            die('404: not found');
        } elseif (is_array($callback)) {

            $callback[0] = new $callback[0];
        }

        return call_user_func($callback);
    }
}
