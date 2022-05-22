<?php

namespace App_hospital\model;

use App_hospital\core\Model;

class User extends Model
{

    public function tableName()
    {

        $this->table = 'users';
    }
}
