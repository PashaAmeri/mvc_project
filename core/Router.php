<?php

/*
    class: Router

    This class help user to move throuth the web apps
*/

namespace App_hospital\core;

use App_hospital\app\controller\SiteController;

class Router
{

    private $routes = [];
    private Request $request;

    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    public function get($uri, $callback, $middleware = null)
    {

        $this->routes['get'][$uri] = [
            'callback' => $callback,
            'middleware' => $middleware
        ];
    }

    public function post($uri, $callback, $middleware = null)
    {

        $this->routes['post'][$uri] = [
            'callback' => $callback,
            'middleware' => $middleware
        ];
    }

    public function notFound($uri = NULL)
    {
        (new Response())->setStatuseCode(404);

        return SiteController::notFound($uri);
    }

    public function resolve()
    {
        //get uri and method
        $method = $this->request->getMethod();
        $uri = $this->request->getURI();

        //check if the requested route is existed
        $route = $this->routes[$method][$uri] ?? NULL;

        $callback = $route['callback'] ?? null;
        $middleware = $route['middleware'] ?? null;

        if (is_null($callback)) {

            //set status code to 404
            return $this->notFound($uri);
        } elseif (is_array($callback)) {

            $callback[0] = new $callback[0];
        }


        if (!is_null($middleware)) {

            $middleware = new $middleware[0]($middleware[1]);
            call_user_func([$middleware, 'check']);
        }

        return call_user_func($callback);
    }
}
