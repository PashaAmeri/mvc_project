<?php

namespace App_hospital\core;

/*
    class: Request;
*/

class Request
{

    public function getMethod()
    {

        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getURI()
    {

        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($uri, '?');

        if ($position === false) {

            return $uri;
        }

        $uri = substr($uri, 0, $position);

        return $uri;
    }
}
