<?php

namespace App_hospital\app\controller;

use App_hospital\core\view\ViewRender;

class SiteController
{

    public static function homeControl()
    {

        return ViewRender::renderView('/home');
    }

    public static function dashbordControl()
    {

        return ViewRender::renderView('/dashboard');
    }

    public static function notFound()
    {

        // return '404: not found';

        return ViewRender::renderView('/404');
    }

    public static function signUp()
    {

        return ViewRender::renderView('/signup');
    }

    public static function logIn()
    {

        return ViewRender::renderView('/login');
    }

    public static function docProfile()
    {

        return ViewRender::renderView('/doc_profile');
    }
}
