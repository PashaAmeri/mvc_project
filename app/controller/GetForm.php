<?php

namespace App_hospital\app\controller;

use App_hospital\core\Application;
use App_hospital\model\User;
use App_hospital\model\Token;
use App_hospital\core\Auth;
use App_hospital\core\Tools;


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
    }

    public function getLogin()
    {

        $data = Application::$app->request->getBody();

        $data = [
            'username' => $data['username'],
            'password' => $data['password']
        ];

        $user = User::do()->find($data['username'], 'username');

        if ($user[0]['password'] === $data['password']) {

            Auth::do()->login($user[0]["ID"]);
            Application::$app->response->reDir('/');
        } else {

            Application::$app->response->reDir('/login');
        }
    }

    public static function getSearch()
    {

        $form_data = Application::$app->request->getBody();

        $data = $form_data['search'] ?? '';
        $order = $form_data['order'] ?? 'ASC';

        if (!is_null($data)) {

            $data = "%$data%";
        }

        return GetDataDB::searchDoctors($data, $order);
    }

    public static function VerifyDoc()
    {

        $form_data = Application::$app->request->getBody();

        $data = [
            'id' => $form_data['verify']
        ];
        
        return GetDataDB::verifyDoc($data);
    }
}
