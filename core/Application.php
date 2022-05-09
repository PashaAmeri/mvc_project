<?php

namespace App_hospital\core;

class Application
{

    public Router $routes;

    public function __construct()
    {

        $this->routes = new Router();
    }

    public function get($uri, $callback)
    {
        $this->routes->get($uri, $callback);
    }

    public function run()
    {
        echo $this->routes->resolve();
    }
}
