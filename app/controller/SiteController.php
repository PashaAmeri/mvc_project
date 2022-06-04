<?php

namespace App_hospital\app\controller;

use App_hospital\core\Application;
use App_hospital\core\view\ViewRender;

class SiteController
{

    public static function homeControl()
    {

        $data['main_doctors'] = GetDataDB::getDoctors();

        return ViewRender::renderView('/home', $data);
    }

    public static function dashbordControl()
    {

        $data = [
            'not_verify_doctors' => GetDataDB::getDoctorsNotVerify(),
            'not_verify_admins' => GetData::getadminsNotVerify(),
        ];

        return ViewRender::renderView('/dashboard', $data);
    }


    public static function dashbordControlPost()
    {

        getForm::VerifyDoc();


        Application::$app->response->reDir('/dashboard');
    }

    public static function notFound()
    {

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

    public static function doctorsControl()
    {
        $data['doctors'] = GetForm::getSearch();
        $data['departments'] = GetDataDB::getDepartments();

        return ViewRender::renderView('/doctors', $data);
    }
}
