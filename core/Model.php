<?php

namespace App_hospital\core;

use App_hospital\core\database\Database;
use App_hospital\core\database\MysqlDatabase;

abstract class Model
{

    private MysqlDatabase $db;

    protected string $table;

    public function __construct()
    {
        $this->tableName();

        $this->db = Application::$app->db->table($this->table);
    }

    //mandatory function
    public abstract function tableName();

    public static function do(): Model
    {
        return new static;
    }

    // return all records
    public function all()
    {
        return $this->db->select()->fetchAll();
    }
    // return the record
    public function find(string $value, string $col = 'id')
    {
        return  $this->db->select()->where($col, $value)->fetchAll();
    }

    // make a new recorde
    public function create(array $data): bool
    {

        return $this->db->insert($data)->exec(); //statement;

    }
    public function delete(string $val1, string $val2, string $operation = '='): bool
    {

        return $this->db->delete()->where($val1, $val2, $operation)->exec();
    }

    public function where($oprand1, $oprand2, $operation = '='): MysqlDatabase
    {

        return $this->db->where($oprand1, $oprand2, $operation);
    }

    // return all the filtered  records by where method
    public function get(): array|false
    {

        return $this->db->fetchAll();
    }


    public function update(array $data, string $val1, string $val2, string $operation = '='): bool
    {

        return $this->db->update($data)->where($val1,  $val2,  $operation)->exec();
    }
}
