<?php

namespace App_hospital\app\controller;

use App_hospital\core\Application;
use App_hospital\model\User;

class GetForm
{

    public function getRegister()
    {
        $data = Application::$app->request->getBody();

        $data = [
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => $data['password']
        ];

        User::do()->create($data);

        Application::$app->response->reDir('/');
        exit;
    }

    public function getLogin()
    {

        //TODO:login page
    }

    public static function getSearch()
    {

        $form_data = Application::$app->request->getBody();

        $data = $form_data['search'] ?? null;

        return GetDataDB::searchDoctors("%$data%", 'name');
    }
}
