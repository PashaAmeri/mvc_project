<?php

namespace App_hospital\exceptions;

use App_hospital\middlewares\AuthMiddleware;

class MiddlewareException extends \Exception
{
    private AuthMiddleware $mid;

    public function __construct(AuthMiddleware $mid)
    {
        $this->mid = $mid;
    }

    public function run()
    {
        $this->mid->failure();
    }
}
