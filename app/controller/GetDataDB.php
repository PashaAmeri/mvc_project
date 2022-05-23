<?php

namespace App_hospital\app\controller;

use App_hospital\core\Application;
use App_hospital\model\Department;
use App_hospital\model\User;

class GetDataDB
{

    public static function getDoctors()
    {

        return User::do()->findFieldsAll(['username', 'name', 'email', 'about'], '2', 'role');
    }

    public static function searchDoctors(string $value, string $order = 'ACS')
    {
        return User::do()->join(['users.ID', 'users.username', 'users.name', 'users.email', 'users.about'], 'doctors', 'ID', 'user_id', '=', $order, 'name', $value, 'LIKE');

        // return User::do()->findFieldsAll(['username', 'name', 'email', 'about'], $value, $col, 'like');
    }

    public static function getDepartments()
    {

        return Department::do()->all();
    }
}
