<?php

namespace App_hospital\core\database;

class Database
{

    private static ?Database $db = null;

    private function __construct()
    {
    }

    public static function db(): Database
    {
        if(is_null(self::$db))
            self::$db = new self();
        return self::$db;
    }

    public function pdo(array $config): \PDO
    {
        $dsn = $config['dsn'];
        $user = $config['user'];
        $password = $config['password'];

        return new \PDO($dsn, $user, $password);
    }

}
