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

    public function get($uri, $callback)
    {

        $this->routes['get'][$uri] = $callback;
    }

    public function resolve()
    {
        //get uri and method
        $method = $this->request->getMethod();
        $uri = $this->request->getURI();

        //check if the requested route is existed
        $callback = $this->routes[$method][$uri] ?? NULL;

        if (is_null($callback)) {

            (new Response())->setStatuseCode(404);
            return SiteController::notFound();
        } elseif (is_array($callback)) {

            $callback[0] = new $callback[0];
        }

        return call_user_func($callback);
    }
}
