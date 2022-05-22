<?php

namespace App_hospital\app\controller;

use App_hospital\core\Application;
use App_hospital\model\User;

class GetDataDB
{

    public static function getDoctors()
    {

        return User::do()->findFieldsAll(['username', 'name', 'email', 'about'], '2', 'role');
    }

    public static function searchDoctors(string $value, string $col = 'ID')
    {

        return User::do()->findFieldsAll(['username', 'name', 'email', 'about'], $value, $col, 'like');
    }
}
