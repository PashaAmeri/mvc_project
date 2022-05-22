<?php

namespace App_hospital\core;

/*
    class: Request;
*/

class Response
{

    public function setStatuseCode(int $code)
    {

        http_response_code($code);
    }

    public function reDir($url = null)
    {

        header('location: ' . $url);
    }
}
