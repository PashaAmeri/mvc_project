<?php

/*
    class: Application

    This class manage tha application behavior
*/

namespace App_hospital\core;

class Application
{

    public static string $ROOT_DIR;
    public static string $HOST;
    public static Application $app;

    public Router $routes;

    public function __construct($root_dir, $host)
    {

        self::$ROOT_DIR = $root_dir;
        self::$HOST = $host;
        self::$app = $this;

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
