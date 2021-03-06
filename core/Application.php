<?php

/*
    class: Application

    This class manage tha application behavior
*/

namespace App_hospital\core;

use App_hospital\core\database\Database;
use App_hospital\core\database\MysqlDatabase;
use App_hospital\exceptions\MiddlewareException;

class Application
{

    public static string $ROOT_DIR;
    public static string $HOST;
    public static Application $app;

    public Router $routes;
    public Request $request;

    public Response $response;
    // public View $view;
    public MysqlDatabase $db;
    public \PDO $pdo;
    public Router $router;

    public function __construct($root_dir, $host, array $config)
    {

        self::$ROOT_DIR = $root_dir;
        self::$HOST = $host;
        self::$app = $this;

        $this->routes = new Router($this->request = new Request());
        $this->response = new Response;

        // self::$ROOT_DIR = $rootPath;
        // self::$app = $this;
        // $this->response = Response::getResponse();
        // $this->request = Request::getRequest();
        // $this->view = new View();
        // $this->router = new Router($this->request, $this->response, $this->view);
        $this->pdo = Database::db()->pdo($config['db']);
        $this->db = new MysqlDatabase($this->pdo);
    }

    public function get($uri, $callback, $middleware = null)
    {
        $this->routes->get($uri, $callback, $middleware);
    }

    public function post($uri, $callback, $middleware = null)
    {
        $this->routes->post($uri, $callback, $middleware);
    }


    public function run()
    {
        try {
            echo $this->routes->resolve();
        } catch (MiddlewareException $exception) {

            $exception->run();
        }
    }
}
