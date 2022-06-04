<?php

namespace App_hospital\middlewares;

use App_hospital\core\Application;
use App_hospital\core\Auth;
use App_hospital\exceptions\MiddlewareException;

class AuthMiddleware
{

    public string $role;

    public function __construct($role)
    {
        $this->role = $role;
    }

    /**
     * @throws MiddlewareException
     */
    public function check()
    {

        $role = Auth::do()->user()[0]['role'];

        if (!Auth::do()->isLogin() or $this->roleSwitch() !== $role)
            throw new MiddlewareException($this);
    }

    public function roleSwitch()
    {

        switch ($this->role) {
            case 'doctor':

                return '2';
                break;

            case 'admin':

                return '3';
                break;

            default:
                # code...
                break;
        }
    }

    public function failure()
    {

        Application::$app->response->reDir('/notfound');
    }
}
