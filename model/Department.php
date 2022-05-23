<?php

namespace App_hospital\model;

use App_hospital\core\Model;

class Department extends Model
{

    public function tableName()
    {

        $this->table = 'departments';
    }
}
