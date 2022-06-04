<?php

namespace App_hospital\app\controller;

use App_hospital\core\Application;
use App_hospital\model\Department;
use App_hospital\model\Doctor;
use App_hospital\model\User;

class GetDataDB
{

    public static function getDoctors()
    {

        // return User::do()->joinOrder(['users.ID', 'users.username', 'users.name', 'users.email', 'users.about', 'doctors.depatment_id'], 'doctors', 'ID', 'user_id', '=');
        return User::do()->findFieldsAll(['username', 'name', 'email', 'about'], '2', 'role');
    }

    public static function getDoctorsNotVerify()
    {

        return User::do()->join(['users.ID', 'users.username', 'users.name', 'users.email', 'users.about', 'doctors.depatment_id'], 'doctors', 'ID', 'user_id', '=', 'authentication', '0', '=');
    }

    
    public static function getadminsNotVerify()
    {

        return User::do()->join(['users.ID', 'users.username', 'users.name', 'users.email', 'users.about', 'doctors.depatment_id'], 'admin', 'ID', 'user_id', '=', 'authentication', '0', '=');
    }
    
    public static function searchDoctors(string $value, string $order = 'ACS')
    {
        return User::do()->joinOrder(['users.ID', 'users.username', 'users.name', 'users.email', 'users.about', 'doctors.depatment_id'], 'doctors', 'ID', 'user_id', '=', $order, 'name', $value, 'LIKE');

        // return User::do()->findFieldsAll(['username', 'name', 'email', 'about'], $value, $col, 'like');
    }

    public static function getDepartments()
    {

        return Department::do()->all();
    }

    public static function verifyDoc(array $data)
    {

        Doctor::do()->update(['authentication' => '1'], 'user_id', $data['id']);
    }
}
