<?php

namespace App_hospital\core\database;

use App_hospital\core\Application;

class MysqlDatabase
{
    
    private \PDO $db;
    private string $table;
    private string $query;
    private array $fields = [];
    private array $where;

    public function __construct(\PDO $pdo)
    {

        $this->db = $pdo;
    }

    // Add table name in the first place
    public function table(string $table): MysqlDatabase
    {

        $this->table = $table;
        return $this;
    }

    // Create table then exec
    public function create(): MysqlDatabase
    {

        $this->query = "CREATE TABLE IF NOT EXISTS {$this->table}";
        return $this;
    }

    // Drop table then exec
    public function drop(): MysqlDatabase
    {

        $this->query = "DROP TABLE {$this->table}";
        return $this;
    }

    // SELECT array $cols from table then fetch or fetchAll
    public function select(array $cols = ['*']): MysqlDatabase
    {

        $this->query =
            "SELECT " . implode(",", $cols) .
            " FROM " . $this->table;
        return $this;
    }

    // SELECT array $cols from table then fetch or fetchAll
    public function insert(array $fields): MysqlDatabase
    {

        $this->fields = $fields;
        $params = array_map(fn ($v) => ":$v", array_keys($fields));
        $this->query =
            "INSERT INTO " . $this->table .
            "(" . implode(",", array_keys($fields)) . ") " .
            "VALUES (" . implode(",", $params) . ")";

        return $this;
    }

    public function update(array $fields): MysqlDatabase
    {

        $this->fields = $fields;

        $arr = array_map(
            fn ($key) => "$key = :$key",
            array_keys($fields),
        );

        $this->query = "UPDATE " . $this->table . " SET " . implode(",", $arr);

        return $this;
    }

    public function where(string $val1, string $val2, string $operation = '='): MysqlDatabase
    {

        $this->where = [
            $val1, $val2, $operation
        ];

        // NOTE: WE CAN ADD OR WHERE
        // NOTE: WE CAN ADD AND WHERE
        $this->query .= " WHERE $val1 $operation '$val2'";

        return $this;
    }

    public function fetch()
    {
        
        $statement = $this->db->prepare($this->query);
        foreach ($this->fields as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function fetchAll()
    {

        $statement = $this->db->prepare($this->query);
        foreach ($this->fields as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function exec(): bool
    {

        $statement = $this->db->prepare($this->query);
        foreach ($this->fields as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }
    public function delete(): MysqlDatabase
    {

        $this->query =
            "DELETE FROM " .$this->table ;
        return $this;

    }
    
}