<?php

namespace App_hospital\model;

use App_hospital\core\Model;

class Token extends Model
{

    public function tableName()
    {

        $this->table = 'token';
    }
}
