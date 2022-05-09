<?php

namespace App_hospital\app\controller;

class SiteController
{

    public static function homeControl()
    {

        return 'home page';
    }

    public static function dashbordControl()
    {

        return 'dashbord page';
    }

    public static function notFound()
    {

        return '404: not found';
    }
}
