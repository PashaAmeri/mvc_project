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

    public function isGet(): bool
    {
        return $this->getMethod() === 'get';
    }


    public function isPost(): bool
    {
        return $this->getMethod() === 'post';
    }

    public function getBody(): array
    {
        $body = [];

        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
