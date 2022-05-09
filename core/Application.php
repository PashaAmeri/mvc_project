<?php

/*
    class: Application

    This class manage tha application behavior
*/

namespace App_hospital\core;

class Application
{

    public Router $routes;

    public function __construct()
    {

        $this->routes = new Router(new Request());
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
