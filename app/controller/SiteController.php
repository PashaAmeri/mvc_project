<?php

namespace App_hospital\app\controller;

use App_hospital\views\ViewRender;

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

    public static function notFound($uri)
    {

        // return '404: not found';

        return ViewRender::renderView('/404');
    }
}
