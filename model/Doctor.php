<?php

namespace App_hospital\model;

use App_hospital\core\Model;

class Doctor extends Model
{

    public function tableName()
    {

        $this->table = 'doctors';
    }
}
