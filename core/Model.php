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
    public function find(string $value, string $col = 'id', $operation = '=')
    {

        return  $this->db->select()->where($col, $value, $operation)->fetchAll();
    }

    public function find2(string $value, string $col = 'id', $operation = '=', $col2, $value2, $operation2)
    {

        return  $this->db->select()->where($col, $value, $operation)->and()->where($col2, $value2, $operation2)->fetchAll();
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
    public function get()
    {

        return $this->db->fetchAll();
    }

    public function update(array $data, string $val1, string $val2, string $operation = '='): bool
    {

        return $this->db->update($data)->where($val1,  $val2,  $operation)->exec();
    }

    public function findFieldsAll(array $fields, string $value, string $col = 'id', string $operation = '=')
    {

        return  $this->db->select($fields)->where($col, $value, $operation)->fetchAll();
    }

    public function findFieldsAllLike(array $fields, string $value, string $col = 'ID', string $operation = '=')
    {

        return  $this->db->select($fields)->where($col, $value, $operation)->fetchAll();
    }

    public function joinOrder(array $fields, string $join_table, string $col1 = 'ID', string $col2 = 'user_id', string $operation_join = '=', $order = 'ACS', string $where1 = null, string $where2 = null, string $operation_where = '=')
    {
        return $this->db->select($fields)->innerJoin($this->table, $join_table, $col1, $col2, $operation_join)->where($where1, $where2, $operation_where)->order($where1, $order)->fetchAll();
    }

    public function join(array $fields, string $join_table, string $col1 = 'ID', string $col2 = 'user_id', string $operation_join = '=', string $where1 = null, string $where2 = null, string $operation_where = '=')
    {
        return $this->db->select($fields)->innerJoin($this->table, $join_table, $col1, $col2, $operation_join)->where($where1, $where2, $operation_where)->fetchAll();
    }

    public function join2(array $fields, string $join_table1, string $col1 = 'ID', string $col2 = 'user_id', string $operation_join1 = '=', string $join_table2, string $col3 = 'ID', string $col4 = 'user_id', string $operation_join2 = '=', $order = 'ACS', string $where1 = null, string $where2 = null, string $operation_where = '=')
    {
        return $this->db->select($fields)->innerJoin($this->table, $join_table1, $col1, $col2, $operation_join1)->innerJoin($this->table, $join_table2, $col3, $col4, $operation_join2)->where($where1, $where2, $operation_where)->order($where1, $order)->fetchAll();
    }
}
